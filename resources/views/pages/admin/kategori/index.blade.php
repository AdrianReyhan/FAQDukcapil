@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Kategori') }}
        </div>

        <div class="d-flex justify-content-start mt-1" style="padding-left: 10px; padding-top:10px">
            <a href="{{ route('categories.create') }}" class="btn btn-primary mb-2">Tambah Kategori</a>
        </div>

        <table class="table table-responsive">
            <thead>
                <tr>
                    <th class="text-center">NO</th>
                    <th class="text-center">NAME</th>
                    <th class="text-center">SLUG</th>
                    <th class="text-center">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('categories.edit', $category->id) }}"
                                    class="btn btn-warning btn-md">Edit</a>
                                <a href="{{ route('categories.show', $category->id) }}"
                                    class="btn btn-info btn-md">Lihat</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                    class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-md delete-button">Delete</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // SweetAlert Notification
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    </script>

    <script>
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                const form = this.closest('.delete-form');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data ini akan dihapus secara permanen dan tidak dapat dikembalikan!",
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
