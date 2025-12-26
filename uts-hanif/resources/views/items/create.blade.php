@extends('layouts.app')

@section('content')
<h2>Tambah Item</h2>

<form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">

    @csrf
    <div class="mb-3">
        <label class="form-label">Nama Item</label>
        <input type="text" name="nama_item" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Jenis</label>
        <input type="text" name="jenis" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" name="harga" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="number" name="stok" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Gambar Barang</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('items.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
