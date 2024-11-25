@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header text-center">
            <h4>{{ __('Tambah Pertanyaan FAQ') }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('faq-questions.store') }}" method="POST">
                @csrf

                <!-- Input Pertanyaan -->
                <div class="form-group mb-3">
                    <label for="question">Pertanyaan</label>
                    <input type="text" name="question" id="question" class="form-control" placeholder="Masukkan pertanyaan" value="{{ old('question') }}" required>
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
@endsection
