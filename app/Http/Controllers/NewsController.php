<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Language;
use App\Models\NewsCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    public function create($lang)
    {
        $languages = Language::All();
        $categories = NewsCategory::all();
        return view('news.create', compact('languages', 'categories'));
    }

    public function store($lang, Request $request)
    {
        $request->validate([
            'news_category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload thumbnail image
        $imagePath = $request->file('image')->store('public/news');

        $news = News::create([
            'news_category_id' => $request->news_category_id,
            'image' => $imagePath,
            'slug' => [],
            'name' => [],
            'content' => [],
        ]);
    
        foreach ($request->input('translations', []) as $locale => $data) {
            $news->setTranslation('name', $locale, $data['name']);
            $news->setTranslation('content', $locale, $data['content']);
            $news->setTranslation('slug', $locale, Str::slug($data['name']));
            
            preg_match_all('/<img[^>]+src=([\'"])?((.*?)\1)/i', $data['content'], $matches);
            
            if (!empty($matches[2])) {
                foreach ($matches[2] as $imageUrl) {
                    $news->images()->create([
                        'url' => $imageUrl
                    ]);
                }
            }
        }
    
        $news->save();
    
        return redirect()->route('news.index', ['lang' => $lang])
            ->with('success', __('News created successfully!'));
    }

    public function edit($lang, News $news)
    {
        $languages = Language::all();
        $categories = NewsCategory::all();
        return view('news.edit', compact('news', 'languages', 'categories'));
    }
    
    public function update($lang, Request $request, News $news)
    {
        $request->validate([
            'news_category_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($news->image) {
                Storage::delete($news->image);
            }
            // Upload new image
            $news->image = $request->file('image')->store('public/news');
        }

        $news->news_category_id = $request->news_category_id;

        foreach ($request->input('translations', []) as $locale => $data) {
            $news->setTranslation('name', $locale, $data['name']);
            $news->setTranslation('content', $locale, $data['content']);
            $news->setTranslation('slug', $locale, Str::slug($data['name']));
            
            // Extract image URLs from content
            preg_match_all('/<img[^>]+src=([\'"])?((.*?)\1)/i', $data['content'], $matches);
            
            if (!empty($matches[2])) {
                // Delete old images first
                $news->images()->delete();
                
                // Create new images
                foreach ($matches[2] as $imageUrl) {
                    $news->images()->create([
                        'url' => $imageUrl
                    ]);
                }
            }
        }
    
        $news->save();
    
        return redirect()->route('news.index', ['lang' => $lang])
            ->with('success', __('News updated successfully!'));
    }
    
    public function destroy($lang, News $news)
    {
        // Delete related images from storage
        foreach ($news->images as $image) {
            $path = str_replace(asset(''), public_path(), $image->url);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        // Delete thumbnail
        if ($news->image) {
            Storage::delete($news->image);
        }
        
        // Delete images records and news
        $news->images()->delete();
        $news->delete();
    
        return redirect()->route('news.index', ['lang' => $lang])
            ->with('success', __('News deleted successfully!'));
    }

    public function show($lang, $slug)
    {
        $news = News::whereRaw("JSON_EXTRACT(slug, '$.\"{$lang}\"') = '\"$slug\"'")->firstOrFail();
        return view('news.show', compact('news'));
    }
}