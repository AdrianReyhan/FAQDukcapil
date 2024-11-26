@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header text-center">
            <h4>{{ __('Edit Pertanyaan FAQ') }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('faq-questions.update', $faqQuestion->id) }}" method="POST">
                @csrf
                @method('PUT')

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
                        value="{{ old('question', $faqQuestion->question) }}" required>
                    @error('question')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Jawaban -->
                <div class="form-group mb-3">
                    <label for="answer">Jawaban</label>
                    <textarea name="answer" id="answer" class="form-control" rows="5" required>{{ old('answer', $faqQuestion->answer) }}</textarea>
                    @error('answer')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol Simpan -->
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('faq-questions.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
