<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $articleCount = Article::count();
        $categoryCount = Category::count();
        $tagCount = Tag::count();
        // $jadwalCount = Jadwal::count();

        return view('pages.admin.dashboard', [
            'categoryCount' => $categoryCount,
            'articleCount' => $articleCount,
            'tagCount' => $tagCount,
        ]);
    }
}
