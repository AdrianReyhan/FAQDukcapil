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

        // Return tampilan dengan data kategori dan pertanyaan FAQ
        return view('welcome', compact('faqCategories'));
    }

    public function faqDetail($id)
    {
        // Ambil FAQ berdasarkan ID
        $faqQuestion = FaqQuestion::findOrFail($id);

        // Kirim data ke tampilan faq-detail
        return view('detail', compact('faqQuestion'));
    }
}
