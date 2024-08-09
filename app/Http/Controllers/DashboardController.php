<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahProduk = Produk::count(); // Menghitung jumlah produk dari tabel produk
        $jumlahUser = User::count(); // Menghitung jumlah user dari tabel users

        return view('admin.dashboard.index', compact('jumlahProduk', 'jumlahUser'));
    }
}
