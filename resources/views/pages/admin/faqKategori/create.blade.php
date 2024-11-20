@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header text-center">
            <h4>{{ __('Tambah Kategori FAQ') }}</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('faq-categories.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="category">Nama Kategori</label>
                    <input type="text" id="category" name="category" class="form-control" placeholder="Masukkan nama kategori" value="{{ old('category') }}" required>
                    @error('category')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('faq-categories.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
