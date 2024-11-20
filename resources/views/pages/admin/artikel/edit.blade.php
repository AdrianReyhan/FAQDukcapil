@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header text-center">
            <h3>Edit Artikel</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('articles.update', $article->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="title">Judul</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $article->title) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="category_id">Kategori</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $article->slug) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="short_text">Deskripsi Singkat</label>
                    <textarea name="short_text" id="short_text" class="form-control">{{ old('short_text', $article->short_text) }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="full_text">Konten Lengkap</label>
                    <textarea name="full_text" id="full_text" class="form-control">{{ old('full_text', $article->full_text) }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="tags">Tags</label>
                    <select name="tags[]" id="tags" class="form-control" multiple>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" {{ $article->tags->contains($tag->id) ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('articles.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
