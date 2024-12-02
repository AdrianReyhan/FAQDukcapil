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

    public function search(Request $request)
    {
        // Ambil kata kunci pencarian dari input user
        $searchQuery = $request->input('query');

        // Jika ada pencarian
        if ($searchQuery) {
            // Pencarian hanya di pertanyaan FAQ
            $faqQuestions = FaqQuestion::where('question', 'like', '%' . $searchQuery . '%')->get();

            return view('welcome', compact('faqQuestions', 'searchQuery'));
        } else {
            // Jika tidak ada pencarian, ambil semua kategori dan pertanyaan
            $faqCategories = FaqCategory::with('faqQuestions')->get();

            return view('welcome', compact('faqCategories', 'searchQuery'));
        }
    }



    public function faqDetail($id)
    {
        // Ambil FAQ berdasarkan ID
        $faqQuestion = FaqQuestion::findOrFail($id);
        $faqCategories = FaqCategory::whereHas('faqQuestions', function ($query) use ($faqQuestion) {
            // Menyaring kategori berdasarkan kategori_id yang sesuai dengan faqQuestion
            $query->where('faq_category_id', $faqQuestion->faq_category_id);
        })->with('faqQuestions')->get();

        // Kirim data ke tampilan faq-detail
        return view('detail', compact('faqCategories', 'faqQuestion'));
    }
}
