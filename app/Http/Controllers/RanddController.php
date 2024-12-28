<?php

namespace App\Http\Controllers;

use App\Models\Randd;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RanddController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $randds = Randd::all();
        return view('randds.index', compact('randds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($lang)
    {
        $languages = Language::All();
        return view('randds.create',compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store($lang, Request $request)
     {
         $randd = Randd::create([
             'slug' => [],
             'title' => [],
             'content' => [],
         ]);
     
         foreach ($request->input('translations', []) as $locale => $data) {
             $randd->setTranslation('title', $locale, $data['title']);
             $randd->setTranslation('content', $locale, $data['content']);
             $randd->setTranslation('slug', $locale, Str::slug($data['title']));
             
             preg_match_all('/<img[^>]+src=([\'"])?((.*?)\1)/i', $data['content'], $matches);
             
             if (!empty($matches[2])) {
                 foreach ($matches[2] as $imageUrl) {
                     $randd->images()->create([
                         'url' => $imageUrl
                     ]);
                 }
             }
         }
     
         $randd->save();
     
         return redirect()->route('randds.index', ['lang' => $lang])
             ->with('success', __('Randd created successfully!'));
     }

    /**
     * Display the specified resource.
     */
    public function show(Randd $randd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($lang, Randd $randd)
    {
        $languages = Language::all();
        return view('randds.edit', compact('randd', 'languages'));
    }
    
    public function update($lang, Request $request, Randd $randd)
    {
        foreach ($request->input('translations', []) as $locale => $data) {
            $randd->setTranslation('title', $locale, $data['title']);
            $randd->setTranslation('content', $locale, $data['content']);
            $randd->setTranslation('slug', $locale, Str::slug($data['title']));
            
            // Extract image URLs from content
            preg_match_all('/<img[^>]+src=([\'"])?((.*?)\1)/i', $data['content'], $matches);
            
            if (!empty($matches[2])) {
                // Delete old images first
                $randd->images()->delete();
                
                // Create new images
                foreach ($matches[2] as $imageUrl) {
                    $randd->images()->create([
                        'url' => $imageUrl
                    ]);
                }
            }
        }
    
        $randd->save();
    
        return redirect()->route('randds.index', ['lang' => $lang])
            ->with('success', __('Randd updated successfully!'));
    }
    
    public function destroy($lang, Randd $randd)
    {
        // Delete related images from storage
        foreach ($randd->images as $image) {
            $path = str_replace(asset(''), public_path(), $image->url);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        // Delete images records and randd
        $randd->images()->delete();
        $randd->delete();
    
        return redirect()->route('randds.index', ['lang' => $lang])
            ->with('success', __('Randd deleted successfully!'));
    }
}