@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header text-center">
            <h4>{{ __('Detail Tag') }}</h4>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">ID</th>
                        <td>{{ $tag->id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nama Tag</th>
                        <td>{{ $tag->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Slug</th>
                        <td>{{ $tag->slug }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Dibuat Pada</th>
                        <td>{{ $tag->created_at->format('d-m-Y H:i:s') }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Diperbarui Pada</th>
                        <td>{{ $tag->updated_at->format('d-m-Y H:i:s') }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="text-center mt-4">
                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('tags.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
