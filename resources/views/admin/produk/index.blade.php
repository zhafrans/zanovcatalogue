@extends('layouts.app')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Produk
                </div>
               

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <!-- Formulir Pencarian -->
                    <div class="d-flex justify-content-between mb-3">
                        <form action="{{ route('admin.produk') }}" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama" value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary ms-2">Search</button>
                        </form>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Data</button>

                    </div>
                    

                    <div class="d-flex justify-content-center mb-3">
                        {{ $produk->links() }}
                    </div>
                    <table id="datatablesSimple" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Gender</th>
                                <th>Bahan</th>
                                <th>Harga Cash</th>
                                <th>Harga Kredit</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            @foreach($produk as $item)
                                <tr>
                                    
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td>{{ $item->gender }}</td>
                                    <td>{{ $item->bahan }}</td>
                                    <td>{{ $item->hargacash }}</td>
                                    <td>{{ $item->hargakredit }}</td>
                                    <td>
                                        <img src="{{ asset('storage/gambar/' . $item->gambar) }}" alt="{{ $item->nama }}" style="max-width: 150px; max-height: 150px;" data-bs-toggle="modal" data-bs-target="#previewModal{{ $item->id }}">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                            Edit
                                        </button>
                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $produk->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    
        <!-- Add Data Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Data Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form Add Produk -->
                    <form action="{{ route('admin.produk.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="kategori" required>
                        </div>
                        <div class="mb-3">
                            <label for="bahan" class="form-label">Bahan</label>
                            <input type="text" class="form-control" id="bahan" name="bahan" required>
                        </div>
                        <div class="mb-3">
                            <label for="hargacash" class="form-label">Harga Cash</label>
                            <input type="text" class="form-control" id="hargacash" name="hargacash" required>
                        </div>
                        <div class="mb-3">
                            <label for="hargakredit" class="form-label">Harga Kredit</label>
                            <input type="text" class="form-control" id="hargakredit" name="hargakredit" required>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="male">pria</option>
                                <option value="female">wanita</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Edit Modal -->
    @foreach($produk as $item)
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form Edit Produk -->
                    <form action="{{ route('admin.produk.update', $item->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $item->nama }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $item->kategori }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="bahan" class="form-label">Bahan</label>
                            <input type="text" class="form-control" id="bahan" name="bahan" value="{{ $item->bahan }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="hargacash" class="form-label">Harga Cash</label>
                            <input type="text" class="form-control" id="hargacash" name="hargacash" value="{{ $item->hargacash }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="hargakredit" class="form-label">Harga Kredit</label>
                            <input type="text" class="form-control" id="hargakredit" name="hargakredit" value="{{ $item->hargakredit }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Delete Confirmation Modal -->
    @foreach($produk as $item)
    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">Konfirmasi Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form action="{{ route('admin.produk.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Preview Modal -->
    @foreach($produk as $item)
    <div class="modal fade" id="previewModal{{ $item->id }}" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewModalLabel">Preview Gambar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('storage/gambar/' . $item->gambar) }}" alt="{{ $item->nama }}" style="width: 100%;">
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
