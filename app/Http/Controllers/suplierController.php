<?php

namespace App\Http\Controllers;

use App\Models\suplier;
use Illuminate\Http\Request;

class suplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $search = $request->input('search');
        $data = suplier::where('nama_suplier', 'like', '%' . $search . '%')->paginate();
        return view(
            'suplier.suplier',compact(
                'data'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suplier.add-suplier');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_suplier'  => 'required',
            'email'         => 'required',
            'alamat'        => 'required',
            'telp'          => 'required|numeric',
            'tgl_terdaftar' => 'required',
            'status'        => 'required',
        ],[
            'nama_suplier.required'  => 'Data Wajib Di Isi',
            'email.required'  => 'Data Wajib Di Isi',
            'alamat.required'  => 'Data Wajib Di Isi',

            'telp.required'  => 'Data Wajib Di Isi',
            'telp.numeric'   => 'Data Berupa Angka',
            'tgl_terdaftar.required'  => 'Data Wajib Di Isi',
            'status.required'  => 'Data Wajib Di Isi',
        ]);

        $saveSuplier = new suplier();
        $saveSuplier->nama_suplier = $request->nama_suplier;
        $saveSuplier->email = $request->email;
        $saveSuplier->alamat = $request->alamat;
        $saveSuplier->telp = $request->telp;
        $saveSuplier->tgl_terdaftar = $request->tgl_terdaftar;
        $saveSuplier->status = $request->status;
        $saveSuplier->save();

        return redirect('/suplier')->with(
            'message',
            'Data' . $request->nama_suplier. ' Berhasil ditambahkan'
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
        $getData = suplier::find($id);
        return view('suplier.edit-suplier', compact(
            'getData'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_suplier'  => 'required',
            'email'         => 'required',
            'alamat'        => 'required',
            'telp'          => 'required|numeric',
            'tgl_terdaftar' => 'required',
            'status'        => 'required',
        ],[
            'nama_suplier.required'  => 'Data Wajib Di Isi',
            'email.required'  => 'Data Wajib Di Isi',
            'alamat.required'  => 'Data Wajib Di Isi',

            'telp.required'  => 'Data Wajib Di Isi',
            'telp.numeric'   => 'Data Berupa Angka',
            'tgl_terdaftar.required'  => 'Data Wajib Di Isi',
            'status.required'  => 'Data Wajib Di Isi',
        ]);

        $saveSuplier = suplier::find($id);
        $saveSuplier->nama_suplier = $request->nama_suplier;
        $saveSuplier->email = $request->email;
        $saveSuplier->alamat = $request->alamat;
        $saveSuplier->telp = $request->telp;
        $saveSuplier->tgl_terdaftar = $request->tgl_terdaftar;
        $saveSuplier->status = $request->status;
        $saveSuplier->save();

        return redirect('/suplier')->with(
            'message',
            'Data' . $request->nama_suplier. ' Berhasil di ubah'
        );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hapus = suplier::find($id);
        $hapus->delete();

        return redirect()->back()->with(
            'message',
            'data ' . $hapus->name . ' Berhasil dihapus!'
        );
    }
}
