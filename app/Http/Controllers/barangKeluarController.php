<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\BarangKeluar;
use App\Models\pelanggan;
use App\Models\stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class barangKeluarController extends Controller
{
    public function index(request $request){
        $quary = BarangKeluar::with(
                    'getstok',
                    'getPelanggan',
                    'getUser',
                );
        
                if ($request->filled('tanggal_awal')&& $request->filled('tanggal_akhir')) {
                    $quary = $quary->whereBetween('tgl_buat',[
        
                        $request->tanggal_awal,
                        $request->tanggal_akhir
                    ]);
        
        
                }
                $quary->orderby('created_at','desc');
                    $getBarangKeluar = $quary->paginate(10);
                    $getTotalPendapatan = BarangKeluar::sum('sub_total');
                    return view('barang.barang-keluar.barangKeluar',compact(
                        'getBarangKeluar',
                        'getTotalPendapatan'
                    ));
    }

    public function create()
    {
        $data = BarangKeluar::all();
        $lastid = BarangKeluar::max('id');
        $lastid = $lastid ? $lastid : 0;

        if ($data->isEmpty()) {
            $nextid = $lastid +1;
            $data = now()->format('d/m/y');
            $kode_transaksi = 'TRK' . $nextid . '/' . $data;

            $pelanggan = pelanggan::all();

            return view('barang.barang-keluar.addBarangKeluar',compact(
                'data',
                'kode_transaksi',
                'pelanggan'
            ));

        }

    $lastestItem = BarangKeluar::latest()->first();
    $id   = $lastestItem->id;
    $data = $lastestItem->created_at->format('d/m/y');
    $kode_transaksi = 'TRK' . $id . '/' . $data;

    $pelanggan = pelanggan::all();

    return view('barang.barang-keluar.addBarangKeluar',compact(
        'data',
        'kode_transaksi',
        'pelanggan'
    ));
}


    public function store(request $request){
        $request->validate([
            'tgl_faktur'        => 'required',
            'tgl_jatuh_tempo'   => 'required',
            'pelanggan_id'      => 'required',
            'jenis_pembayaran'  => 'required',
        ],[
            'tgl_faktur.required'        => 'Data Wajib Di isi',
            'tgl_jatuh_tempo.required'   => 'Data Wajib Di isi',
            'pelanggan_id.required'      => 'Data Wajib Di isi',
            'jenis_pembayaran.required'  => 'Data Wajib Di isi',

        ]);

        $kode_transaksi = $request->kode_transaksi;
        $tgl_faktur = $request->tgl_faktur;
        $tgl_jatuh_tempo = $request->tgl_jatuh_tempo;
        $pelanggan_id = $request->pelanggan_id;

        $getNamaPelanggan = pelanggan::find($pelanggan_id);
        $nama_pelanggan = $getNamaPelanggan->nama_pelanggan;
        $jenis_pembayaran = $request->jenis_pembayaran;

        $getBarang = stok::all();

        return view('transaksi.transaksi',compact(

            'kode_transaksi',
            'tgl_faktur',
            'tgl_jatuh_tempo',
            'pelanggan_id',
            'nama_pelanggan',
            'jenis_pembayaran',
            'getBarang',
        ));

    }
        public function savabarangkeluar(request $request)
        {
            $request->validate([
                'kode_transaksi'    => 'required',
                'tgl_faktur'        => 'required',
                'tgl_jatuh_tempo'   => 'required',
                'pelanggan_id'      => 'required',
                'jenis_pembayaran'  => 'required',
                'barang_id'         => 'required',
                'jumlah_beli'       => 'required',
                'harga_jual'        => 'required',
            ]);

            $save = new BarangKeluar();
            $save ->kode_transaksi = $request->kode_transaksi;
            $save ->tgl_faktur = $request->tgl_faktur;
            $save ->tgl_jatuh_tempo = $request->tgl_jatuh_tempo;
            $save ->pelanggan_id = $request->pelanggan_id;
            $save ->jenis_pembayaran = $request->jenis_pembayaran;
            $save ->barang_id = $request->barang_id;
            $save ->harga_jual = $request->harga_jual;
            $save ->jumlah_beli = $request->jumlah_beli;
            
            $getStokData = stok::find($request->barang_id);
            $getjumlahstok = $getStokData->stok;
            $getStokData->stok = $getjumlahstok - $request->jumlah_beli;
            $getStokData->save();

            $diskon = $request->diskon;
            $nilaiDiskon = $diskon/100;

            if ($diskon) {
                $save->diskon = $request->diskon;
                $hitung = $request->jumlah_beli * $request->harga_jual;
                $totalDiskon = $hitung * $nilaiDiskon;
                $subTotal = $hitung - $totalDiskon;
                $save->sub_total = $subTotal;
            }else{
                $hitung = $request->jumlah_beli * $request->harga_jual;
                $save->sub_total = $hitung;
            }

            $save->user_id = Auth::user()->id;
            $save->tgl_buat = $request->tgl_faktur;
            $save->save();

            return redirect('/barang-keluar')->with(
                'message',
                'Barang Keluar add'
            );
        }

        public function print($id)
        {
            $dataPrint = BarangKeluar::with(
                'getStok',
                'getPelanggan'
            )->find($id);

            return view('Nota.nota',compact(
                'dataPrint'
            ));
        }
        
        public function destroy($id)
        {
            $delete = BarangKeluar::find($id);
                $getId_barang_keluar = $delete->barang_id;
                $getJumlah_barang_keluar = $delete->barang_id;
            
                $update = stok::find($getJumlah_barang_keluar);
                    $getStok = $update->stok;
                
                    $jumlah_baru = $getStok + $getJumlah_barang_keluar;
                $update->stok = $jumlah_baru;
                $update->save();
            
            $delete->delete();
            return redirect('/barang-keluar')->with(
                'message',
                'Data Berhasil Di Hapus'
            );
        }


    }












