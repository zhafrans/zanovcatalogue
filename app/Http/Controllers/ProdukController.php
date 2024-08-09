<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->query('search');
        $produk = Produk::where('nama', 'like', "%$keyword%")
                        ->orWhere('kategori', 'like', "%$keyword%")
                        ->orWhere('bahan', 'like', "%$keyword%")
                        ->paginate(10);

        
        return view('admin.produk.index', compact('produk'));
    }

    
    public function create()
    {
    
        // Tampilkan form untuk menambahkan menu baru
        return view('admin.produk.create');
    }

    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'nama' => 'required',
        'kategori' => 'required',
        'bahan' => 'required',
        'hargacash' => 'required',
        'gender' => 'required',
        'hargakredit' => 'required',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif',
    ]);

    try {
        $gambar_file = $request->file('gambar');
        $gambar_ekstensi = $gambar_file->extension();
        $gambar_nama = date('ymdhis') . "." . $gambar_ekstensi;

        // Store the image in the 'storage' folder
        if ($gambar_file->storeAs('public/gambar', $gambar_nama)) {
            $data = [
                'nama' => $request->nama,
                'kategori' => $request->kategori,
                'bahan' => $request->bahan,
                'hargacash' => $request->hargacash,
                'hargakredit' => $request->hargakredit,
                'gender' => $request->gender,
                'gambar' => $gambar_nama,
            ];

            Produk::create($data);

            return redirect()->route('admin.produk')->with('success', 'Data Produk berhasil ditambahkan.');
        } else {
            Log::error('Gambar gagal diunggah.');
            return redirect()->back()->with('error', 'Gambar gagal diunggah.');
        }
    } catch (\Exception $e) {
        // Log the detailed error
        Log::error('Terjadi kesalahan saat mengunggah gambar: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}




    public function edit($id)
    {
        // Fetch data from the database
    $produk = Produk::findOrFail($id);

    // Return a view with the edit form
    return view('admin.produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'kategori' => 'required',
        'bahan' => 'required',
        'hargacash' => 'required',
        'hargakredit' => 'required',
        // 'gambar' => 'image',
    ]);

    $produk = Produk::findOrFail($id);

    // Simpan nama gambar lama untuk dihapus nanti
    $gambarLama = $produk->gambar;

    $produk->update([
        'nama' => $request->nama,
        'kategori' => $request->kategori,
        'bahan' => $request->bahan,
        'hargacash' => $request->hargacash,
        'hargakredit' => $request->hargakredit,
    ]);

    // Handle optional image update
    if ($request->hasFile('gambar')) {
        $gambar_file = $request->file('gambar');
        $gambar_ekstensi = $gambar_file->extension();
        $gambar_nama = date('ymdhis') . "." . $gambar_ekstensi;

        // Store the new image in the 'storage' folder
        Storage::putFileAs('public/gambar', $gambar_file, $gambar_nama);

        // Update the 'gambar' field in the database
        $produk->update(['gambar' => $gambar_nama]);

        // Hapus gambar lama dari penyimpanan
        if ($gambarLama) {
            $filePath = 'public/gambar/' . $gambarLama;

            // Check if the file exists before attempting to delete
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            }
        }
    }

    return redirect()->route('admin.produk')->with('success', 'Produk data updated successfully.');
}
    
    
    public function destroy($id)
{
    $produk = Produk::findOrFail($id);

    // Delete the associated file from the storage
    if ($produk->gambar) {
        $filePath = 'public/gambar/' . $produk->gambar;

        // Check if the file exists before attempting to delete
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
    }

    $produk->delete();

    return redirect()->route('admin.produk')->with('success', 'Produk data deleted successfully.');
}

public function search(Request $request)
{
    $keyword = $request->input('keyword');
    $kategori = $request->input('kategori');
    $bahan = $request->input('bahan');
    $gender = $request->input('gender');

    // Sesuaikan dengan struktur dan nama kolom di tabel produk
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

    $produk = $query->paginate(6); // Sesuaikan sesuai kebutuhan

    return view('web.home', compact('produk'));
}

}
