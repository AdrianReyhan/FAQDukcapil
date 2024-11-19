<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('pages.admin.artikel.index', compact('articles'));
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
        $request->validate([
            'title' => 'required|string|max:255',
            'full_text' => 'required',
            'short_text' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
        ]);

        $article = Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'full_text' => $request->full_text,
            'short_text' => $request->short_text,
            'category_id' => $request->category_id,
        ]);

        if ($request->tags) {
            $article->tags()->sync($request->tags);
        }

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function show($id)
    {
        $articles = Article::with(['category', 'tags'])->findOrFail($id);
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
        ]);

        $article = Article::findOrFail($id);
        $article->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'full_text' => $request->full_text,
            'short_text' => $request->short_text,
            'category_id' => $request->category_id,
        ]);

        if ($request->tags) {
            $article->tags()->sync($request->tags);
        }

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $articles = Article::findOrFail($id);
        $articles->delete();
        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
