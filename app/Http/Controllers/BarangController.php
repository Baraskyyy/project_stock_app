<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Facade as Auth;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $quary = barang::with(
 'getstok',
            'getsuplier',
            'getadmin',
        );

        if ($request->filled('tanggal_awal')&& $request->filled('tanggal_akhir')) {
            $quary = $quary->whereBetween('tanggal_faktur',[

                $request->tanggal_awal,
                $request->tanggal_akhir
            ]);


        }
        $quary->orderby('created_at','desc');
            $getData = $quary->paginate(10);
            return view('barang.barangMasuk',compact(
                'getData'
            ));
        // return view('barang.barangMasuk');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $getnama_barang_id = stok::with('getsuplier')->get();
        return view('barang.addBarangMasuk',compact(
            'getnama_barang_id'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'tanggal_faktur'        =>'required',
        'nama_barang_id'        =>'required',
        'jumlah'                =>'required',
        ]);

        $updateStok = stok::find($request->nama_barang_id);
        if ($request->filled('harga')) {
            $barang_beli = $request->harga;
        } else {
            $barang_beli = $updateStok->harga;
        }
            $saveBarang = new barang();
            $saveBarang->tanggal_faktur = $request->tanggal_faktur;
            $saveBarang->nama_barang_id = $request->nama_barang_id;

            $saveBarang-> suplier_id = $updateStok->suplier_id;

            $saveBarang-> harga = $barang_beli;

            $saveBarang->jumlah_barang_masuk = $request->jumlah;
            $saveBarang->admin_id = FacadesAuth::user()->id;
            $saveBarang->save();

            $hitung = $updateStok->stok + $request->jumlah;
            $updateStok->stok = $hitung;
            $updateStok->save();

        return redirect('/barang-masuk')->with(
            'message',
            'barang', $request->nama_barang_id, 'berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
