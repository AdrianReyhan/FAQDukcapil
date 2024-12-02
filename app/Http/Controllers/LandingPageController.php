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
        $searchQuery = $request->input('query');

        if ($searchQuery) {
            $faqQuestions = FaqQuestion::with('category')
                ->where('question', 'like', '%' . $searchQuery . '%')
                ->get();

            $faqCategories = FaqCategory::with(['faqQuestions' => function ($query) use ($searchQuery) {
                $query->where('question', 'like', '%' . $searchQuery . '%');
            }])
                ->where('category', 'like', '%' . $searchQuery . '%')
                ->get();
        } else {
            $faqCategories = FaqCategory::with('faqQuestions')->get();
            $faqQuestions = FaqQuestion::with('category')->get();
        }

        // Mengembalikan tampilan dan data pencarian, sertakan query dalam parameter URL
        return view('welcome', [
            'faqCategories' => $faqCategories,
            'faqQuestions' => $faqQuestions,
            'searchQuery' => $searchQuery
        ]);
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
