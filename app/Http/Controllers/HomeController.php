<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $produk = Produk::paginate(6); // Sesuaikan dengan jumlah item yang ingin ditampilkan per halaman
        return view('web.home', compact('produk'));
    }

    public function search(Request $request)
{
    $keyword = $request->input('keyword');
    $kategori = $request->input('kategori');
    $bahan = $request->input('bahan');
    $gender = $request->input('gender');

    $query = Produk::query();

    if ($keyword) {
        $query->where('nama', 'like', '%' . $keyword . '%');
    }

    if ($kategori) {
        $query->where('kategori', $kategori);
    }

    if ($bahan) {
        $query->where('bahan', $bahan);
    }

    if ($gender) {
        $query->where('gender', $gender);
    }

    $produk = $query->paginate(9);

    // Sesuaikan dengan tampilan yang diinginkan jika hasil pencarian kosong
    if ($produk->isEmpty()) {
        return view('admin.produk.index')->with('produk', $produk)->with('error', 'Data not found');
    }

    return view('admin.produk.index', compact('produk'));
}

}
