@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header text-center">
            <h4>{{ __('Detail Pertanyaan FAQ') }}</h4>
        </div>
        <div class="card-body">
            <!-- Tampilkan kategori -->
            <div class="form-group mb-3">
                <label for="category"><strong>Kategori:</strong></label>
                <p id="category">
                    {{ $faqQuestion->category ? $faqQuestion->category->category : 'Tidak ada kategori' }}
                </p>
            </div>

            <div class="form-group mb-3">
                <label for="question"><strong>Pertanyaan:</strong></label>
                <p id="question">{{ $faqQuestion->question }}</p>
            </div>

            <!-- Tampilkan Jawaban -->
            <div class="form-group mb-3">
                <label for="answer"><strong>Jawaban:</strong></label>
                <p id="answer">{{ $faqQuestion->answer }}</p>
            </div>

            <!-- Tombol Kembali -->
            <a href="{{ route('faq-questions.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection
