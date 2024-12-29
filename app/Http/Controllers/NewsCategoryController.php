<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-news_categories')->only('index');
        $this->middleware('permission:create-news_categories')->only(['create', 'store']);
        $this->middleware('permission:edit-news_categories')->only(['edit', 'update']);
        $this->middleware('permission:delete-news_categories')->only('destroy');
    }

    public function index()
    {
        $categories = NewsCategory::all();
        return view('news_categories.index', compact('categories'));
    }

    public function create($lang)
    {
        $languages = Language::all();
        return view('news_categories.create', compact('languages'));
    }

    public function store($lang, Request $request)
    {
        $category = NewsCategory::create([
            'slug' => [],
            'name' => [],
        ]);

        foreach ($request->input('translations', []) as $locale => $data) {
            $category->setTranslation('name', $locale, $data['name']);
            // Generate slug from name
            $category->setTranslation('slug', $locale, Str::slug($data['name']));
        }

        $category->save();

        return redirect()->route('news_categories.index')->with('success', __('Category created successfully!'));
    }

    public function edit($lang, NewsCategory $news_category)
    {
        $languages = Language::all();
        return view('news_categories.edit', compact('news_category', 'languages'));
    }

    public function update($lang, Request $request, NewsCategory $news_category)
    {
        foreach ($request->input('translations', []) as $locale => $data) {
            $news_category->setTranslation('name', $locale, $data['name']);
            // Update slug based on new name
            $news_category->setTranslation('slug', $locale, Str::slug($data['name']));
        }

        $news_category->save();

        return redirect()->route('news_categories.index')->with('success', __('Category updated successfully!'));
    }

    public function destroy($lang, NewsCategory $news_category)
    {
        $news_category->delete();
        return redirect()->route('news_categories.index')->with('success', __('Category deleted successfully!'));
    }
}