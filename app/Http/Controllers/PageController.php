<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-pages')->only('index');
        $this->middleware('permission:create-pages')->only(['create', 'store']);
        $this->middleware('permission:edit-pages')->only(['edit', 'update']);
        $this->middleware('permission:delete-pages')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::all();
        return view('pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($lang)
    {
        $languages = Language::All();
        return view('pages.create',compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store($lang, Request $request)
     {
         $page = Page::create([
             'slug' => [],
             'title' => [],
             'content' => [],
         ]);
     
         foreach ($request->input('translations', []) as $locale => $data) {
             $page->setTranslation('title', $locale, $data['title']);
             $page->setTranslation('content', $locale, $data['content']);
             $page->setTranslation('slug', $locale, Str::slug($data['title']));
             
             preg_match_all('/<img[^>]+src=([\'"])?((.*?)\1)/i', $data['content'], $matches);
             
             if (!empty($matches[2])) {
                 foreach ($matches[2] as $imageUrl) {
                     $page->images()->create([
                         'url' => $imageUrl
                     ]);
                 }
             }
         }
         
         $page->is_header = $request->is_header;
         $page->is_footer = $request->is_footer;
         $page->save();
     
         return redirect()->route('pages.index', ['lang' => $lang])
             ->with('success', __('Page created successfully!'));
     }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($lang, Page $page)
    {
        $languages = Language::all();
        return view('pages.edit', compact('page', 'languages'));
    }
    
    public function update($lang, Request $request, Page $page)
    {
        foreach ($request->input('translations', []) as $locale => $data) {
            $page->setTranslation('title', $locale, $data['title']);
            $page->setTranslation('content', $locale, $data['content']);
            $page->setTranslation('slug', $locale, Str::slug($data['title']));
            
            // Extract image URLs from content
            preg_match_all('/<img[^>]+src=([\'"])?((.*?)\1)/i', $data['content'], $matches);
            
            if (!empty($matches[2])) {
                // Delete old images first
                $page->images()->delete();
                
                // Create new images
                foreach ($matches[2] as $imageUrl) {
                    $page->images()->create([
                        'url' => $imageUrl
                    ]);
                }
            }
        }
        
        $page->is_header = $request->is_header;
        $page->is_footer = $request->is_footer;
        $page->save();
    
        return redirect()->route('pages.index', ['lang' => $lang])
            ->with('success', __('Page updated successfully!'));
    }
    
    public function destroy($lang, Page $page)
    {
        // Delete related images from storage
        foreach ($page->images as $image) {
            $path = str_replace(asset(''), public_path(), $image->url);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        // Delete images records and page
        $page->images()->delete();
        $page->delete();
    
        return redirect()->route('pages.index', ['lang' => $lang])
            ->with('success', __('Page deleted successfully!'));
    }
}