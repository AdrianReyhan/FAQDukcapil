@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <h3>Detail Kategori</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">ID</th>
                        <td>{{ $category->id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nama</th>
                        <td>{{ $category->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Slug</th>
                        <td>{{ $category->slug }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Dibuat Pada</th>
                        <td>{{ $category->created_at->format('d-m-Y H:i:s') }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Diperbarui Pada</th>
                        <td>{{ $category->updated_at->format('d-m-Y H:i:s') }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
@endsection
