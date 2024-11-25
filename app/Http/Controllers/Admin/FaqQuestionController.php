<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqQuestion;
use Illuminate\Http\Request;

class FaqQuestionController extends Controller
{
    public function index()
    {
        $faqQuestions = FaqQuestion::all();
        return view('pages.admin.faqQuestion.index', compact('faqQuestions'));
    }

    public function create()
    {
        return view('pages.admin.faqQuestion.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        FaqQuestion::create($request->all());

        return redirect()->route('faq-questions.index')->with('success', 'Pertanyaan FAQ berhasil ditambahkan.');
    }

    public function show(FaqQuestion $faqQuestions)
    {
        return view('pages.admin.faqQuestion.show', compact('faqQuestions'));
    }

    public function edit(FaqQuestion $faqQuestions)
    {
        return view('pages.admin.faqQuestion.edit', compact('faqQuestions'));
    }

    public function update(Request $request, FaqQuestion $faqQuestions)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faqQuestions->update($request->all());

        return redirect()->route('faq-questions.index')->with('success', 'Pertanyaan FAQ berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $faqQuestions = FaqQuestion::findOrFail($id);
        $faqQuestions->delete();

        return redirect()->route('faq-questions.index')->with('success', 'Pertanyaan FAQ berhasil dihapus.');
    }
}
