<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('pages.admin.kategori.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
            'slug' => 'required|unique:categories,slug',
        ]);

        $slug = $request->input('slug') ?: Str::slug($request->input('name'));

        Category::create([
            'name' => $request->input('name'),
            'slug' => $slug,
        ]);
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function show(Category $category)
    {
        return view('pages.admin.kategori.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('pages.admin.kategori.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'slug' => 'required|unique:categories,slug,' . $category->id,
        ]);

        $slug = $request->input('slug') ?: Str::slug($request->input('name'));

        $category->update([
            'name' => $request->input('name'),
            'slug' => $slug,
        ]);
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
