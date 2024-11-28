<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use App\Models\FaqQuestion;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        // Ambil semua kategori dan pertanyaan FAQ terkait
        $faqCategories = FaqCategory::with('faqQuestions')->get();

        // Ambil satu pertanyaan FAQ tertentu, misalnya yang pertama
        $faqQuestion = FaqQuestion::first(); // Anda bisa memilih sesuai kebutuhan

        // Return tampilan dengan data kategori dan pertanyaan FAQ
        return view('welcome', compact('faqCategories', 'faqQuestion'));
    }


    public function faqDetail($id)
    {
        // Ambil FAQ berdasarkan ID
        $faqQuestion = FaqQuestion::findOrFail($id);

        // Kirim data ke tampilan faq-detail
        return view('detail', compact('faqQuestion'));
    }
}
