<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    public function index()
    {
        $faqCategories = FaqCategory::paginate(2);
        return view('pages.admin.faqKategori.index', compact('faqCategories'));
    }

    public function create()
    {
        return view('pages.admin.faqKategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
        ]);

        FaqCategory::create($request->all());

        return redirect()->route('faq-categories.index')->with('success', 'Kategori FAQ berhasil ditambahkan.');
    }

    public function show(FaqCategory $faqCategory)
    {
        return view('pages.admin.faqKategori.show', compact('faqCategory'));
    }

    public function edit(FaqCategory $faqCategory)
    {
        return view('pages.admin.faqKategori.edit', compact('faqCategory'));
    }

    public function update(Request $request, FaqCategory $faqCategory)
    {
        $request->validate([
            'category' => 'required|string|max:255',
        ]);

        $faqCategory->update($request->all());

        return redirect()->route('faq-categories.index')->with('success', 'Kategori FAQ berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $faqCategory = FaqCategory::findOrFail($id);
        $faqCategory->delete();

        return redirect()->route('faq-categories.index')->with('success', 'Kategori FAQ berhasil dihapus.');
    }
}
