<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $articles = Article::with(['category', 'tags'])->latest()->paginate(10); // 10 artikel per halaman
        return view('pages.admin.artikel.index', compact('articles', 'categories'));
    }

    public function create()
    {
        $articles = Article::all();
        $tags = Tag::all();
        $categories = Category::all();
        return view('pages.admin.artikel.create', compact('articles', 'tags', 'categories'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'full_text' => 'required',
            'short_text' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'image' => 'nullable|image|max:2048', // Validasi gambar
        ]);

        // Membuat slug otomatis berdasarkan judul artikel
        $slug = Str::slug($request->title);

        // Pastikan slug unik
        if (Article::where('slug', $slug)->exists()) {
            $slug .= '-' . time(); // Jika slug sudah ada, tambahkan timestamp untuk membuatnya unik
        }

        // Ambil data dari request dan tambahkan slug
        $data = $request->only(['title', 'full_text', 'short_text', 'category_id']);
        $data['slug'] = $slug;  // Menambahkan slug yang telah dibuat

        // Proses unggah gambar (jika ada)
        if ($request->hasFile('image')) {
            // Cek jika artikel sudah memiliki gambar lama dan hapus gambar tersebut
            if ($article = Article::find($request->id)) {
                if ($article->image) {
                    Storage::disk('public')->delete($article->image);
                }
            }

            // Menyimpan gambar baru dan mendapatkan pathnya
            $data['image'] = $request->file('image')->store('uploads/articles', 'public');
        }

        // Menyimpan artikel baru
        $article = Article::create($data);

        // Menambahkan tags jika ada
        if ($request->tags) {
            $article->tags()->sync($request->tags);
        }

        // Redirect ke halaman daftar artikel
        return redirect()->route('articles.index')->with('success', 'Artikel berhasil ditambahkan.');
    }



    public function show($id)
    {
        $articles = Article::with(['category', 'tags'])->findOrFail($id);
        $articles->increment('views_count');
        return view('pages.admin.artikel.show', compact('articles'));
    }

    public function edit($id)
    {
        $article = Article::with(['category', 'tags'])->findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('pages.admin.artikel.edit', compact('article', 'categories', 'tags'));
    }

    // Memperbarui artikel
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'full_text' => 'required',
            'short_text' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'image' => 'nullable|image|max:2048', // Validasi gambar
        ]);

        $article = Article::findOrFail($id);
        $data = $request->only(['title', 'slug', 'full_text', 'short_text', 'category_id']);

        // Proses unggah gambar
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }

            $data['image'] = $request->file('image')->store('uploads/articles', 'public');
        }

        $article->update($data);

        if ($request->tags) {
            $article->tags()->sync($request->tags);
        }

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        // Hapus gambar jika ada
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
