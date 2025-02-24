<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\Barangkeluar;
use App\Http\Controllers\barangKeluarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\pelangganContrller;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\stokcontroller;
use App\Http\Controllers\suplierController;
use Illuminate\Support\Facades\Route;



Route::get('/', [AuthController::class, 'index']);
Route::post('/', [AuthController::class, 'login'])->name('login');


Route::middleware(['auth', 'cekLevel:superadmin,admin'])->group(function(){


    Route::get('/dashboard', [HomeController::class, 'index']);
    Route::get('/logout', [AuthController::class, 'logout']);


    /*
    ini adalah routing pegawai
    */
    route::controller(PegawaiController::class)->group(function()
    {

        // ini untuk menampilkan data pegawai
        route::get('/pegawai','index');

        // ini untuk menambahkan data pegawai
        route::post('/pegawai/add','store')->name('addPegawai');

        // ini untuk edit pegawai
        route::get('/pegawai/edit/{id}','edit');
        route::post('/pegawai/edit/{id}', 'update');

        // ini untuk hapus pegawai
        route::get('/pegawai/delete/{id}','destroy');

        // # DOKUMENTASI PEGAWAI


    });


    /*
    ini adalah routing suplier
    */

    route::controller(suplierController::class)->group(function()
    {
        // ini untuk menampilkan data suplier
        route::get('/suplier','index');

        // ini untuk menambahkan data suplier
        route::get('/suplier/add','create');
        route::post('/suplier/add','store');

        // ini untuk edit suplier
        route::get('/suplier/edit/{id}','edit');
        route::post('/suplier/edit/{id}','update');

        // ini untuk menghapus suplier
        route::get('/suplier/delete/{id}','destroy');

        // # DOKUMENTASI SUPLIER

    });

    /*
    ini adalah routing pelanggan
    */

    route::controller(PelangganController::class)->group(function()
    {
        // ini untuk menampilkan pelanggan
        route::get('/pelanggan','index');

        // ini untuk menambahkan data suplier
        route::get('/pelanggan/add','create');
        route::post('/pelanggan/add','store');

        // ini untuk edit pelanggan
         route::get('/pelanggan/edit/{id}','edit');
         route::post('/pelanggan/edit/{id}','update');

        // ini untuk menghapus pelanggan
        route::get('/pelanggan/delete/{id}','destroy');

        // # DOKUMENTASI PELANGGAN
    });

    route::controller(stokcontroller::class)->group(function()
    {
        // ini untuk menampilkan pelanggan
        route::get('/stok','index');

        // ini untuk menambahkan data suplier
        route::get('/stok/add','create');
        route::post('/stok/add','store');

        // ini untuk edit pelanggan
         route::get('/stok/edit/{id}','edit');
         route::post('/stok/edit/{id}','update');

        // ini untuk menghapus stok
        route::get('/stok/{id}','destroy');

        // # DOKUMENTASI STOK
    });

    route::controller(BarangController::class)->group(function()
    {
        // ini untuk menampilkan barang masuk
        route::get('/barang-masuk','index');

        // ini untuk menambahkan data barang masuk
        route::get('/barang-masuk/add','create');
        route::post('/barang-masuk/add','store');

        // ini untuk edit pelanggan
         route::get('/barang-masuk/edit/{id}','edit');
         route::post('/barang-masuk/{id}','update');

        // ini untuk menghapus pelanggan
        // route::get('/stok/{id}','destroy');

        // # DOKUMENTASI PELANGGAN
    });

    route::controller(barangKeluarController::class)->group(function()
    {
        // ini untuk menampilkan barang masuk
        route::get('/barang-keluar','index');

        // ini untuk menambahkan data barang masuk
        route::get('barang-keluar/add','create');
        route::post('/barang-keluar/add','store');
        route::post('/barang-keluar/save','savabarangkeluar')->name('addBarangKeluar');

        route::get('/barang-keluar/print/{id}','print');
        

        // ini untuk edit pelanggan
         route::get('/barang-masuk/edit/{id}','edit');
         route::post('/barang-masuk/{id}','update');

        // ini untuk menghapus pelanggan
        // route::get('/stok/{id}','destroy');

        // # DOKUMENTASI PELANGGAN
    });

});
