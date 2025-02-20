<?php

namespace App\Http\Controllers;

use App\Models\stok;
use App\Models\suplier;
use Illuminate\Http\Request;

class stokcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $getData = stok::with('getSuplier')
        ->orwhere('kode_barang', 'like', '%' . $search . '%')
        ->orwhere('nama_barang', 'like', '%' . $search . '%')
        ->paginate();


        return view('stok.stok',compact(
            'getData'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $getSuplier = suplier::all();
        return view('stok.addstok',compact(
            'getSuplier'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'suplier' => 'required',
            'cabang' => 'required',
        ]);

        $saveStok = new stok();
        $saveStok->kode_barang = $request->input('kode_barang');
        $saveStok->nama_barang = $request->input('nama_barang');
        $saveStok->harga = $request->input('harga');
        $saveStok->stok = $request->input('stok');
        $saveStok->suplier_id = $request->input('suplier');
        $saveStok->cabang = $request->input('cabang');
        $saveStok->save();
        // dd($saveStok);
        return redirect('/stok')->with(
            'message',
            'stok', $request->nama_barang, 'berhasil ditambahkan'
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

        $getDataStokId = stok::with('getSuplier')->find($id);
        $getSuplier = suplier::all();
        return view('stok.editstok',compact(
            'getDataStokId',
            'getSuplier'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'suplier' => 'required',
            'cabang' => 'required',
        ]);

        $saveStok = stok::find($id);
        $saveStok->kode_barang = $request->input('kode_barang');
        $saveStok->nama_barang = $request->input('nama_barang');
        $saveStok->harga = $request->input('harga');
        $saveStok->stok = $request->input('stok');
        $saveStok->suplier_id = $request->input('suplier');
        $saveStok->cabang = $request->input('cabang');
        $saveStok->save();
        // dd($saveStok);
        return redirect('/stok')->with(
            'message',
            'stok', $request->nama_barang, 'berhasil ditambahkan'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $getDataStokId = stok::find($id);
        // $getDataStokId->delete();

        // return redirect()->back()->with(
        //     'message',
        //  $getDataStokId->nama_barang . '' . ' Berhasil dihapus!'
        // );
    }
}
