@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Edit Kategori') }}
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name">Nama Kategori</label>
                    <input type="text" name="name" id="name" class="form-control" 
                           value="{{ old('name', $category->name) }}" placeholder="Masukkan nama kategori" required>
                </div>
                <div class="form-group mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" 
                           value="{{ old('slug', $category->slug) }}" placeholder="Slug akan terisi otomatis" readonly>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

    <script>
        // JavaScript untuk otomatis mengisi slug berdasarkan nama
        document.getElementById('name').addEventListener('input', function() {
            const name = this.value;
            const slug = name.toLowerCase()
                            .replace(/[^a-z0-9\s-]/g, '') // Menghapus karakter non-alphanumeric
                            .replace(/\s+/g, '-')         // Mengganti spasi dengan tanda hubung
                            .replace(/-+/g, '-');         // Menghapus tanda hubung ganda
            document.getElementById('slug').value = slug;
        });
    </script>
@endsection
