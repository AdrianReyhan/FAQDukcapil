@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header text-center">
            <h4>{{ __('Tambah Tag') }}</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('tags.store') }}" method="POST">
                @csrf

                <!-- Nama Tag -->
                <div class="form-group mb-3">
                    <label for="name">Nama Tag</label>
                    <input type="text" id="name" name="name" class="form-control"
                           placeholder="Masukkan nama tag" value="{{ old('name') }}" required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Slug (readonly, dihasilkan otomatis) -->
                <div class="form-group mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" id="slug" name="slug" class="form-control"
                           placeholder="Slug akan dihasilkan otomatis" value="{{ old('slug') }}" readonly>
                </div>

                <!-- Tombol -->
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('tags.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Menghasilkan slug otomatis dari input nama tag
        document.getElementById('name').addEventListener('input', function () {
            const slug = this.value
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, '-') // Ganti spasi atau karakter khusus dengan "-"
                .replace(/^-+|-+$/g, ''); // Hilangkan "-" di awal/akhir
            document.getElementById('slug').value = slug;
        });
    </script>
@endsection
