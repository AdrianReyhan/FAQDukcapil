<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqQuestion;
use Illuminate\Http\Request;

class FaqQuestionController extends Controller
{
    public function index()
    {
        $faqQuestions = FaqQuestion::paginate(2);
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

    public function show($id)
    {
        $faqQuestions = FaqQuestion::findOrFail($id);
        return view('pages.admin.faqQuestion.show', compact('faqQuestions'));
    }


    public function edit($id)
    {
        $faqQuestion = FaqQuestion::findOrFail($id); // Ambil data berdasarkan ID atau tampilkan 404 jika tidak ditemukan
        return view('pages.admin.faqQuestion.edit', compact('faqQuestion'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faqQuestion = FaqQuestion::findOrFail($id); // Ambil data berdasarkan ID
        $faqQuestion->update([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return redirect()->route('faq-questions.index')->with('success', 'Pertanyaan FAQ berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $faqQuestions = FaqQuestion::findOrFail($id);
        $faqQuestions->delete();

        return redirect()->route('faq-questions.index')->with('success', 'Pertanyaan FAQ berhasil dihapus.');
    }
}
