<?php

namespace App\Http\Controllers;

use App\Models\Vitamin;
use App\Models\VitaminCategory;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        // Get popular vitamins (6-8 vitamins)
        $popularVitamins = Vitamin::with('category')
            ->where('is_popular', true)
            ->orderBy('order')
            ->limit(8)
            ->get();

        // Get latest educational articles (3 articles)
        $articles = Article::published()
            ->latest('published_at')
            ->limit(3)
            ->get();

        // Get categories count
        $categoriesCount = VitaminCategory::withCount('vitamins')->get();

        return view('home', compact('popularVitamins', 'articles', 'categoriesCount'));
    }
}
