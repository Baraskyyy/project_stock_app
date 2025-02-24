<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\pelanggan;
use App\Models\stok;
use App\Models\suplier;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $getSuplier = suplier::count();
        $getPelanggan =pelanggan::count();
        $getStok = stok::count();
        $getPendapatan = BarangKeluar::sum('sub_total');

        return view('dashboard.dashboard', compact(
            'getSuplier',
            'getStok',
            'getPelanggan',            'getStok',
            'getPendapatan'
        ));
    }

//     public function hitung()
// {
//     $totalSuplier = suplier::count(); // Menghitung jumlah semua suplier
//     return view('dashboard.dashboard', compact('totalSuplier'));

//     $totalUsers = pelanggan::count(); // Menghitung jumlah semua user
//     return view('dashboard.dashboard', compact('totalUsers'));


// }

}
