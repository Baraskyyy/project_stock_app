<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $data = pelanggan::where('nama_pelanggan', 'LIKE', '%' . $search . '%')->paginate();
        return view(
            'pelanggan.pelanggan',compact(
                'data'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggan.addPelanggan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            // validasi data
            'nama_pelanggan'  => 'required',
            'telp'            => 'required|numeric',
            'jenis_kelamin'   => 'required',
            'alamat'          => 'required',
            'kota'            => 'required',
            'provinsi'        => 'required',
        ],[

            // mengecek ulang data yang di input
            'nama_pelanggan.required'  => 'Data Wajib Di Isi',
            'jenis_kelamin.required'   => 'Data Wajib Di Isi',
            'alamat.required'          => 'Data Wajib Di Isi',
            'kota.required'            => 'Data Wajib Di Isi',
            'provinsi.required'        => 'Data Wajib Di Isi',

            // memastikan telpon berupa angka
            'telp.required'  => 'Data Wajib Di Isi',
            'telp.numeric'   => 'Data Berupa Angka',
        ]);

        // menyimpan hasil dari inputan user
        $savePelanggan = new pelanggan();
        $savePelanggan->nama_pelanggan = $request->nama_pelanggan;
        $savePelanggan->telp           = $request->telp;
        $savePelanggan->jenis_kelamin  = $request->jenis_kelamin;
        $savePelanggan->alamat         = $request->alamat;
        $savePelanggan->kota           = $request->kota;
        $savePelanggan->provinsi       = $request->provinsi;
        $savePelanggan->save();

        return redirect('/pelanggan')->with(
            'message',
            'data ' . $request->nama_pelanggan . ' Berhasil ditambahkan'
        );

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
        $dataPelanggan = pelanggan::find($id);
        return view('pelanggan.editPelanggan', compact(
            'dataPelanggan'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pelanggan'  => 'required',
            'telp'            => 'required|numeric',
            'jenis_kelamin'   => 'required',
            'alamat'          => 'required',
            'kota'            => 'required',
            'provinsi'        => ' required',
        ],[
            'nama_pelanggan.required'  => 'Data Wajib Di Isi',
            'jenis_kelamin.required'  => 'Data Wajib Di Isi',
            'alamat.required'  => 'Data Wajib Di Isi',
            'kota.required'  => 'Data Wajib Di Isi',
            'provinsi.required'  => 'Data Wajib Di Isi',


            'telp.required'  => 'Data Wajib Di Isi',
            'telp.numeric'   => 'Data Berupa Angka',
        ]);

        $savePelanggan = pelanggan::find($id);
        $savePelanggan->nama_pelanggan = $request->nama_pelanggan;
        $savePelanggan->telp           = $request->telp;
        $savePelanggan->jenis_kelamin  = $request->jenis_kelamin;
        $savePelanggan->alamat         = $request->alamat;
        $savePelanggan->kota           = $request->kota;
        $savePelanggan->provinsi       = $request->provinsi;
        $savePelanggan->save();

        return redirect('/pelanggan')->with(
            'message',
            'data ' . $request->nama_pelanggan . ' '. ' Berhasil diubah'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hapusPelanggan = pelanggan::find($id);
        $hapusPelanggan->delete();

        return redirect()->back()->with(
            'message',
            'data ' . $hapusPelanggan->nama_pelanggan . '' . ' Berhasil dihapus!'
        );
    }
}
