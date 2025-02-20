<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use App\Models\suplier;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard');
    }

    public function hitung()
{
    $totalSuplier = suplier::count(); // Menghitung jumlah semua suplier
    return view('dashboard.dashboard', compact('totalSuplier'));

    $totalUsers = pelanggan::count(); // Menghitung jumlah semua user
    return view('dashboard.dashboard', compact('totalUsers'));


}

}
