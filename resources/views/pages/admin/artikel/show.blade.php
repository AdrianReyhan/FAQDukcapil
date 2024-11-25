@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <h3>Detail Artikel</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">NO</th>
                        <td>{{ $articles->id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Judul</th>
                        <td>{{ $articles->title }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Gambar</th>
                        <td>
                            @if ($articles->image)
                                <img src="{{ asset('storage/' . $articles->image) }}" alt="Gambar Artikel" class="img-thumbnail"
                                    width="100">
                            @else
                                <span>Tidak ada gambar</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Kategori</th>
                        <td>{{ $articles->category->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Slug</th>
                        <td>{{ $articles->slug }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Deskripsi Singkat</th>
                        <td>{{ $articles->short_text }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Konten Lengkap</th>
                        <td>{!! $articles->full_text !!}</td>
                    </tr>
                    <tr>
                        <th scope="row">Tags</th>
                        <td>
                            @foreach ($articles->tags as $tag)
                                <span class="badge bg-info text-dark">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Dibuat Pada</th>
                        <td>{{ $articles->created_at->format('d-m-Y H:i:s') }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Diperbarui Pada</th>
                        <td>{{ $articles->updated_at->format('d-m-Y H:i:s') }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('articles.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
@endsection
