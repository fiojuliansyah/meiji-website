<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ApprovalModule;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-abouts')->only('index');
        $this->middleware('permission:create-abouts')->only(['create', 'store']);
        $this->middleware('permission:edit-abouts')->only(['edit', 'update']);
        $this->middleware('permission:delete-abouts')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index($lang)
    {
        $abouts = About::all();
        return view('abouts.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($lang)
    {
        $languages = Language::All();
        return view('abouts.create',compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store($lang, Request $request)
     {
         $about = About::create([
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

         $approvalModule = ApprovalModule::find(2) ?? ApprovalModule::find(1);

         $approvalTypes = $approvalModule->types->pluck('id');

         foreach ($approvalTypes as $typeId) {
             $about->requiredApprovals()->create(['approval_type_id' => $typeId]);
         }
     
         return redirect()->route('abouts.index', ['lang' => $lang])
             ->with('success', __('About created successfully!'));
     }

    public function edit($lang, About $about)
    {
        $languages = Language::all();
        return view('abouts.edit', compact('about', 'languages'));
    }
    
    public function update($lang, Request $request, About $about)
    {
        foreach ($request->input('translations', []) as $locale => $data) {
            $about->setTranslation('title', $locale, $data['title']);
            $about->setTranslation('content', $locale, $data['content']);
            $about->setTranslation('slug', $locale, Str::slug($data['title']));
            
            preg_match_all('/<img[^>]+src=([\'"])?((.*?)\1)/i', $data['content'], $matches);
            
            if (!empty($matches[2])) {
                $about->images()->delete();
                
                foreach ($matches[2] as $imageUrl) {
                    $about->images()->create([
                        'url' => $imageUrl
                    ]);
                }
            }
        }

        $about->approvals()->delete();

        $approvalModule = ApprovalModule::find(2) ?? ApprovalModule::find(1);

        $approvalTypes = $approvalModule->types->pluck('id');
        
        $about->requiredApprovals()->delete();
        foreach ($approvalTypes as $typeId) {
            $about->requiredApprovals()->create(['approval_type_id' => $typeId]);
        }
    
        $about->save();
    
        return redirect()->route('abouts.index', ['lang' => $lang])
            ->with('success', __('About updated successfully!'));
    }
    
    public function destroy($lang, About $about)
    {
        foreach ($about->images as $image) {
            $path = str_replace(asset(''), public_path(), $image->url);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        $about->images()->delete();
        $about->delete();
    
        return redirect()->route('abouts.index', ['lang' => $lang])
            ->with('success', __('About deleted successfully!'));
    }

    public function show($lang, About $about)
    {
        return view('abouts.show', compact('about'));
    }
}
