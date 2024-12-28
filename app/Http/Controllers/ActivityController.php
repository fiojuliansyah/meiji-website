<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::all();
        return view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($lang)
    {
        $languages = Language::All();
        return view('activities.create',compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store($lang, Request $request)
     {
         $about = Activity::create([
             'slug' => [],
             'title' => [],
             'content' => [],
         ]);
     
         foreach ($request->input('translations', []) as $locale => $data) {
             $about->setTranslation('title', $locale, $data['title']);
             $about->setTranslation('content', $locale, $data['content']);
             $about->setTranslation('slug', $locale, Str::slug($data['title']));
             
             preg_match_all('/<img[^>]+src=([\'"])?((.*?)\1)/i', $data['content'], $matches);
             
             if (!empty($matches[2])) {
                 foreach ($matches[2] as $imageUrl) {
                     $about->images()->create([
                         'url' => $imageUrl
                     ]);
                 }
             }
         }
     
         $about->save();
     
         return redirect()->route('activities.index', ['lang' => $lang])
             ->with('success', __('Activity created successfully!'));
     }

    /**
     * Display the specified resource.
     */
    public function show(Activity $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($lang, Activity $about)
    {
        $languages = Language::all();
        return view('activities.edit', compact('about', 'languages'));
    }
    
    public function update($lang, Request $request, Activity $about)
    {
        foreach ($request->input('translations', []) as $locale => $data) {
            $about->setTranslation('title', $locale, $data['title']);
            $about->setTranslation('content', $locale, $data['content']);
            $about->setTranslation('slug', $locale, Str::slug($data['title']));
            
            // Extract image URLs from content
            preg_match_all('/<img[^>]+src=([\'"])?((.*?)\1)/i', $data['content'], $matches);
            
            if (!empty($matches[2])) {
                // Delete old images first
                $about->images()->delete();
                
                // Create new images
                foreach ($matches[2] as $imageUrl) {
                    $about->images()->create([
                        'url' => $imageUrl
                    ]);
                }
            }
        }
    
        $about->save();
    
        return redirect()->route('activities.index', ['lang' => $lang])
            ->with('success', __('Activity updated successfully!'));
    }
    
    public function destroy($lang, Activity $about)
    {
        // Delete related images from storage
        foreach ($about->images as $image) {
            $path = str_replace(asset(''), public_path(), $image->url);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        // Delete images records and about
        $about->images()->delete();
        $about->delete();
    
        return redirect()->route('activities.index', ['lang' => $lang])
            ->with('success', __('Activity deleted successfully!'));
    }
}
