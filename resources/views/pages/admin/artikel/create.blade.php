@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header text-center">
            <h4>{{ __('Tambah Artikel') }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('articles.store') }}" method="POST">
                @csrf

                <!-- Judul Artikel -->
                <div class="form-group mb-3">
                    <label for="title">Judul Artikel</label>
                    <input type="text" id="title" name="title" class="form-control"
                        placeholder="Masukkan judul artikel" required>
                </div>

                <!-- Kategori -->
                <div class="form-group mb-3">
                    <label for="category_id">Kategori</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <option value="" selected disabled>Pilih kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Short Text -->
                <div class="form-group mb-3">
                    <label for="short_text">Deskripsi Singkat</label>
                    <textarea id="short_text" name="short_text" class="form-control" rows="3"
                        placeholder="Masukkan deskripsi singkat artikel" required></textarea>
                </div>

                <!-- Full Text -->
                <div class="form-group">
                    <label for="full_text">Konten Lengkap</label>
                    <textarea id="full_text" name="full_text" class="form-control" rows="10"
                        placeholder="Masukkan konten lengkap artikel"></textarea>
                </div>



                <!-- Tags -->
                <div class="form-group mb-3">
                    <label for="tags">Tags</label>
                    <select name="tags[]" id="tags" class="form-control" multiple>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Gunakan Ctrl (Windows) atau Command (Mac) untuk memilih beberapa
                        tag.</small>
                </div>


                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('articles.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('title').addEventListener('input', function() {
            const slug = this.value
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, '-') // Ganti spasi dan karakter khusus dengan tanda -
                .replace(/^-+|-+$/g, ''); // Hilangkan tanda - di awal/akhir
            document.getElementById('slug').value = slug;
        });
    </script>

    <script>
        tinymce.init({
            selector: '#full_text', // Targetkan textarea dengan ID full_text
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            height: 300, // Tinggi editor
            menubar: false // Sembunyikan menubar (opsional)
        });
    </script>
@endsection
