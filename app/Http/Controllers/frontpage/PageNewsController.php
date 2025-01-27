<?php

namespace App\Http\Controllers\frontpage;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageNewsController extends Controller
{
    public function index($lang)
    {
        $news = News::News::where('is_published', true)->with('category')->latest()->paginate(9);
        return view('frontpage.news.index', compact('news'));
    }

    public function category($lang, $slug)
    {
        $category = NewsCategory::where('slug->'.$lang, $slug)->firstOrFail();
        $news = News::where('news_category_id', $category->id)
                    ->latest()
                    ->paginate(9);

        return view('frontpage.news.category', compact('news', 'category'));
    }

    public function show($lang, $category_slug, $news_slug)
    {
        $news = News::whereJsonContains('slug->' . $lang, $news_slug)
                    ->firstOrFail();
    
        $recent_posts = News::latest()->take(5)->get();
    
        return view('frontpage.news.show', compact('news', 'recent_posts'));
    }
    
}