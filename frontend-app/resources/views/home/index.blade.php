@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title mb-3">Daftar Category</h1>
                
                    <div class="mb-3">
                        <a href="{{ route('category.create') }}" class="btn btn-primary">Create Category</a>
                    </div>

                    @if (!empty($category))
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $category)
                                    <tr>
                                        <td>{{ $category['id'] ?? '' }}</td>
                                        <td>{{ $category['name'] ?? '' }}</td>
                                        <td>{{ $category['description'] ?? '' }}</td>
                                        <td>{{ $category['created_at'] ?? '' }}</td>
                                        <td> 
                                        <form action="{{ route('category.destroy', $category['id']) }}" 
                                        method="POST" 
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus category ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"> Hapus </button>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="card-text">Belum ada data category.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection