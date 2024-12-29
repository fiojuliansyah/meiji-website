<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-categories')->only('index');
        $this->middleware('permission:create-categories')->only(['create', 'store']);
        $this->middleware('permission:edit-categories')->only(['edit', 'update']);
        $this->middleware('permission:delete-categories')->only('destroy');
    }

    public function index($lang)
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create($lang)
    {
        $languages = Language::all();
        return view('categories.create', compact('languages'));
    }

    public function store($lang, Request $request)
    {
        $category = Category::create([
            'slug' => [],
            'name' => [],
        ]);

        foreach ($request->input('translations', []) as $locale => $data) {
            $category->setTranslation('name', $locale, $data['name']);
            // Generate slug from name
            $category->setTranslation('slug', $locale, Str::slug($data['name']));
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', __('Category created successfully!'));
    }

    public function edit($lang, Category $category)
    {
        $languages = Language::all();
        return view('categories.edit', compact('category', 'languages'));
    }

    public function update($lang, Request $request, Category $category)
    {
        foreach ($request->input('translations', []) as $locale => $data) {
            $category->setTranslation('name', $locale, $data['name']);
            // Update slug based on new name
            $category->setTranslation('slug', $locale, Str::slug($data['name']));
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', __('Category updated successfully!'));
    }

    public function destroy($lang, Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', __('Category deleted successfully!'));
    }
}
