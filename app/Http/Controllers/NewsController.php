<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Language;
use Illuminate\Support\Str;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Models\ApprovalModule;
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
        $news_categories = NewsCategory::all();
        return view('news.create', compact('languages', 'news_categories'));
    }

    public function store($lang, Request $request)
    {
        $request->validate([
            'news_category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user()->id;

        $imagePath = $request->file('image')->store('public/news');

        $news = News::create([
            'news_category_id' => $request->news_category_id,
            'image' => $imagePath,
            'slug' => [],
            'name' => [],
            'content' => [],
            'date_published' => $request->date_published,
            'user_id' => $user,
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

        $approvalModule = ApprovalModule::find(5) ?? ApprovalModule::find(1);

         $approvalTypes = $approvalModule->pluck('id');

         foreach ($approvalTypes as $typeId) {
             $news->requiredApprovals()->create(['approval_type_id' => $typeId]);
         }
    
        return redirect()->route('news.index', ['lang' => $lang])
            ->with('success', __('News created successfully!'));
    }

    public function edit($lang, News $news)
    {
        $languages = Language::all();
        $news_categories = NewsCategory::all();
        return view('news.edit', compact('news', 'languages', 'news_categories'));
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
        $news->date_plubished = $request->date_plubished;

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

        $approvalModule = ApprovalModule::find(5) ?? ApprovalModule::find(1);

        $approvalTypes = $approvalModule->pluck('id');
        
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
        $recent_posts = News::latest()->take(5)->get();
        $news_categories = NewsCategory::all();
        return view('news.show', compact('news', 'recent_posts','news_categories'));
    }
}