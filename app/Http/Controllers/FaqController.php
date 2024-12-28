<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($lang)
    {
        $languages = Language::All();
        return view('faqs.create',compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store($lang, Request $request)
     {
         $faq = Faq::create([
             'slug' => [],
             'title' => [],
             'content' => [],
         ]);
     
         foreach ($request->input('translations', []) as $locale => $data) {
             $faq->setTranslation('title', $locale, $data['title']);
             $faq->setTranslation('content', $locale, $data['content']);
             $faq->setTranslation('slug', $locale, Str::slug($data['title']));
             
             preg_match_all('/<img[^>]+src=([\'"])?((.*?)\1)/i', $data['content'], $matches);
             
             if (!empty($matches[2])) {
                 foreach ($matches[2] as $imageUrl) {
                     $faq->images()->create([
                         'url' => $imageUrl
                     ]);
                 }
             }
         }
     
         $faq->save();
     
         return redirect()->route('faqs.index', ['lang' => $lang])
             ->with('success', __('Faq created successfully!'));
     }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($lang, Faq $faq)
    {
        $languages = Language::all();
        return view('faqs.edit', compact('faq', 'languages'));
    }
    
    public function update($lang, Request $request, Faq $faq)
    {
        foreach ($request->input('translations', []) as $locale => $data) {
            $faq->setTranslation('title', $locale, $data['title']);
            $faq->setTranslation('content', $locale, $data['content']);
            $faq->setTranslation('slug', $locale, Str::slug($data['title']));
            
            // Extract image URLs from content
            preg_match_all('/<img[^>]+src=([\'"])?((.*?)\1)/i', $data['content'], $matches);
            
            if (!empty($matches[2])) {
                // Delete old images first
                $faq->images()->delete();
                
                // Create new images
                foreach ($matches[2] as $imageUrl) {
                    $faq->images()->create([
                        'url' => $imageUrl
                    ]);
                }
            }
        }
    
        $faq->save();
    
        return redirect()->route('faqs.index', ['lang' => $lang])
            ->with('success', __('Faq updated successfully!'));
    }
    
    public function destroy($lang, Faq $faq)
    {
        // Delete related images from storage
        foreach ($faq->images as $image) {
            $path = str_replace(asset(''), public_path(), $image->url);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        // Delete images records and faq
        $faq->images()->delete();
        $faq->delete();
    
        return redirect()->route('faqs.index', ['lang' => $lang])
            ->with('success', __('Faq deleted successfully!'));
    }
}
