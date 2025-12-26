@extends('layouts.app')

@section('content')
<h2>Edit Item</h2>

<form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nama Item</label>
        <input type="text" name="nama_item" value="{{ $item->nama_item }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Jenis</label>
        <input type="text" name="jenis" value="{{ $item->jenis }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" name="harga" value="{{ $item->harga }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="number" name="stok" value="{{ $item->stok }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Gambar Barang</label>
        @if($item->image)
            <img src="{{ asset('storage/' . $item->image) }}" width="100" class="mb-2">
        @endif
        <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Perbarui</button>
    <a href="{{ route('items.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
