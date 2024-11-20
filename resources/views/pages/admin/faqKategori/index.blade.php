@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header text-center">
            <h4>{{ __('Daftar Kategori FAQ') }}</h4>
        </div>

        <div class="card-body">
            <a href="{{ route('faq-categories.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-container">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faqCategories as $faqCategory)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $faqCategory->category }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('faq-categories.edit', $faqCategory->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{ route('faq-categories.show', $faqCategory->id) }}"
                                            class="btn btn-info btn-sm">Lihat</a>
                                        <form action="{{ route('faq-categories.destroy', $faqCategory->id) }}" method="POST"
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
                    text: "Artikel ini akan dihapus secara permanen dan tidak dapat dikembalikan!",
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
