<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\FaqQuestion;
use App\Models\Tag;
use Illuminate\Http\Request;


class DashboardAdminController extends Controller
{
    public function index()
    {
        $articleCount = Article::count();
        $categoryCount = Category::count();
        $tagCount = Tag::count();
        $faqQuestion = FaqQuestion::count();
        // $jadwalCount = Jadwal::count();

        return view('pages.admin.dashboard', [
            'categoryCount' => $categoryCount,
            'articleCount' => $articleCount,
            'tagCount' => $tagCount,
            'faqQuestion' => $faqQuestion,
        ]);
    }
}
