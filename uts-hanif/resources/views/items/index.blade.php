@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Daftar Item Olahraga</h2>
    <a href="{{ route('items.create') }}" class="btn btn-primary">Tambah Item</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama Item</th>
            <th>Jenis</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nama_item }}</td>
            <td>{{ $item->jenis }}</td>
            <td>Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
            <td>{{ $item->stok }}</td>
            <td>
                @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" width="110" height="125" alt="{{$item->nama_item}}">
                @else
                <span>Tidak ada gambar</span>
                @endif
            </td>
            <td>
                <a href="{{ route('items.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('items.destroy', $item) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus item ini?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
