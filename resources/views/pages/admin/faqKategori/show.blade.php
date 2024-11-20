@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header text-center">
            <h4>{{ __('Detail Kategori FAQ') }}</h4>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $faqCategory->id }}</td>
                </tr>
                <tr>
                    <th>Nama Kategori</th>
                    <td>{{ $faqCategory->category }}</td>
                </tr>
                <tr>
                    <th>Dibuat Pada</th>
                    <td>{{ $faqCategory->created_at }}</td>
                </tr>
                <tr>
                    <th>Diperbarui Pada</th>
                    <td>{{ $faqCategory->updated_at }}</td>
                </tr>
            </table>
            <a href="{{ route('faq-categories.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection
