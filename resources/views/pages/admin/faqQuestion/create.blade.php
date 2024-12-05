@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header text-center">
            <h4>{{ __('Tambah Pertanyaan FAQ') }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('faq-questions.store') }}" method="POST" id="faqForm">
                @csrf

                <div class="form-group mb-3">
                    <label for="faq_category_id">Kategori</label>
                    <select name="faq_category_id" id="faq_category_id" class="form-control">
                        <option value="" selected>Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('faq_category_id', $faqQuestion->faq_category_id ?? '') == $category->id ? 'selected' : '' }}>
                                {{ $category->category }}
                            </option>
                        @endforeach
                    </select>
                    @error('faq_category_id')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Pertanyaan -->
                <div class="form-group mb-3">
                    <label for="question">Pertanyaan</label>
                    <input type="text" name="question" id="question" class="form-control"
                        placeholder="Masukkan pertanyaan" value="{{ old('question') }}" required>
                    @error('question')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Jawaban -->
                <div class="form-group mb-3">
                    <label for="answer">Jawaban</label>
                    <textarea name="answer" id="answer" class="form-control" placeholder="Masukkan jawaban" rows="5" required>{{ old('answer') }}</textarea>
                    @error('answer')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol Simpan -->
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('faq-questions.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

    <!-- Inisialisasi TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/5ibnn5gcdir3oe9787qyp3x9a792aw257jv39apisf3cpkok/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#answer',
            valid_elements: 'p,b,strong,i,em,ul,ol,li,a[href],img[src|alt],h1,h2,h3,h4,h5,h6,br', // Tentukan elemen yang diizinkan
            plugins: [
                'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'link', 'lists',
                'searchreplace', 'table', 'visualblocks', 'wordcount', 
            ],
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat | image',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            images_upload_url: '/upload', // Endpoint untuk upload gambar
            images_upload_credentials: true, // Kirim kredensial jika perlu
            file_picker_types: 'image',
            automatic_uploads: true,
            file_picker_callback: function(callback, value, meta) {
                if (meta.filetype === 'image') {
                    const input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');
                    input.onchange = function() {
                        const file = this.files[0];
                        const reader = new FileReader();
                        reader.onload = function() {
                            callback(reader.result, {
                                alt: file.name
                            });
                        };
                        reader.readAsDataURL(file);
                    };
                    input.click();
                }
            },
            setup: function(editor) {
                // Pastikan setiap kali editor berubah, data disalin ke textarea
                editor.on('change', function() {
                    tinymce.triggerSave();
                });
            }
        });

        // Tambahkan event listener pada form untuk memanggil tinymce.triggerSave sebelum submit
        document.querySelector('#faqForm').addEventListener('submit', function() {
            tinymce.triggerSave(); // Menyimpan data dari TinyMCE ke textarea sebelum submit
        });
    </script>
@endsection
