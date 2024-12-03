<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use App\Models\FaqQuestion;
use Illuminate\Http\Request;

class FaqQuestionController extends Controller
{
    public function index()
    {
        $faqQuestions = FaqQuestion::with('category')->paginate(10);
        return view('pages.admin.faqQuestion.index', compact('faqQuestions'));
    }

    public function create()
    {
        $categories = FaqCategory::all();

        return view('pages.admin.faqQuestion.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'faq_category_id' => 'nullable|exists:faq_categories,id',
        ]);

        $answer = html_entity_decode($request->answer);


        FaqQuestion::create([
            'question' => $request->question,
            'answer' => $answer,
            'faq_category_id' => $request->faq_category_id,
        ]);

        return redirect()->route('faq-questions.index')->with('success', 'Pertanyaan FAQ berhasil ditambahkan.');
    }

    public function show($id)
    {
        $faqQuestion = FaqQuestion::with('category')->findOrFail($id);
        return view('pages.admin.faqQuestion.show', compact('faqQuestion'));
    }


    public function edit($id)
    {
        $faqQuestion = FaqQuestion::findOrFail($id);
        $categories = FaqCategory::all();

        return view('pages.admin.faqQuestion.edit', compact('faqQuestion', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'faq_category_id' => 'nullable|exists:faq_categories,id', // Validasi foreign key
        ]);

        $faqQuestion = FaqQuestion::findOrFail($id);
        $faqQuestion->update($request->all());

        return redirect()->route('faq-questions.index')->with('success', 'Pertanyaan FAQ berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $faqQuestions = FaqQuestion::findOrFail($id);
        $faqQuestions->delete();

        return redirect()->route('faq-questions.index')->with('success', 'Pertanyaan FAQ berhasil dihapus.');
    }
}
