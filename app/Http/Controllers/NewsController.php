<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Language;
use Illuminate\Support\Str;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-news')->only('index');
        $this->middleware('permission:create-news')->only(['create', 'store']);
        $this->middleware('permission:edit-news')->only(['edit', 'update']);
        $this->middleware('permission:delete-news')->only('destroy');
    }

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
        
        $news->user_id = Auth::id();
        $news->save();

        $approvalTypes = [1, 2, 3, 4, 5, 6];
        foreach ($approvalTypes as $typeId) {
            $news->requiredApprovals()->create(['approval_type_id' => $typeId]);
        }
    
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
            if ($news->image) {
                Storage::delete($news->image);
            }
            $news->image = $request->file('image')->store('public/news');
        }

        $news->news_category_id = $request->news_category_id;

        foreach ($request->input('translations', []) as $locale => $data) {
            $news->setTranslation('name', $locale, $data['name']);
            $news->setTranslation('content', $locale, $data['content']);
            $news->setTranslation('slug', $locale, Str::slug($data['name']));
            
            preg_match_all('/<img[^>]+src=([\'"])?((.*?)\1)/i', $data['content'], $matches);
            
            if (!empty($matches[2])) {
                $news->images()->delete();
                foreach ($matches[2] as $imageUrl) {
                    $news->images()->create([
                        'url' => $imageUrl
                    ]);
                }
            }
        }
    
        $news->approvals()->delete();

        $approvalTypes = [1, 2, 3, 4, 5, 6];
        $news->requiredApprovals()->delete();
        foreach ($approvalTypes as $typeId) {
            $news->requiredApprovals()->create(['approval_type_id' => $typeId]);
        }

        $news->save();
    
        return redirect()->route('news.index', ['lang' => $lang])
            ->with('success', __('News updated successfully!'));
    }
    
    public function destroy($lang, News $news)
    {
        foreach ($news->images as $image) {
            $path = str_replace(asset(''), public_path(), $image->url);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        if ($news->image) {
            Storage::delete($news->image);
        }
        
        $news->images()->delete();
        $news->delete();
    
        return redirect()->route('news.index', ['lang' => $lang])
            ->with('success', __('News deleted successfully!'));
    }

    public function show($lang, News $news)
    {
        $languages = Language::all();
        return view('news.show', compact('news', 'languages'));
    }
}