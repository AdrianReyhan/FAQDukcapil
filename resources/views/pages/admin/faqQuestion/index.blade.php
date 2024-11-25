@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header text-center">
            <h4>{{ __('Daftar Pertanyaan FAQ') }}</h4>
        </div>

        <div class="card-body">
            <a href="{{ route('faq-questions.create') }}" class="btn btn-primary mb-3">Tambah Pertanyaan</a>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-container">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faqQuestions as $faqQuestion)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $faqQuestion->question }}</td>
                                <td>{{ Str::limit($faqQuestion->answer, 50) }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('faq-questions.edit', $faqQuestion->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{ route('faq-questions.show', $faqQuestion->id) }}"
                                            class="btn btn-info btn-sm">Lihat</a>
                                        <form action="{{ route('faq-questions.destroy', $faqQuestion->id) }}" method="POST"
                                            class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="btn btn-danger btn-sm delete-button">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script>
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                const form = this.closest('.delete-form');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Pertanyaan ini akan dihapus secara permanen dan tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
