<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ApprovalModule;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-activities')->only('index');
        $this->middleware('permission:create-activities')->only(['create', 'store']);
        $this->middleware('permission:edit-activities')->only(['edit', 'update']);
        $this->middleware('permission:delete-activities')->only('destroy');
    }
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

         $approvalModule = ApprovalModule::find(3) ?? ApprovalModule::find(1);

         $approvalTypes = $approvalModule->types->pluck('id');

         foreach ($approvalTypes as $typeId) {
             $about->requiredApprovals()->create(['approval_type_id' => $typeId]);
         }
     
         return redirect()->route('activities.index', ['lang' => $lang])
             ->with('success', __('Activity created successfully!'));
     }

    
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

        $approvalModule = ApprovalModule::find(3) ?? ApprovalModule::find(1);

        $approvalTypes = $approvalModule->types->pluck('id');
        
        $about->requiredApprovals()->delete();
        foreach ($approvalTypes as $typeId) {
            $about->requiredApprovals()->create(['approval_type_id' => $typeId]);
        }

        $about->save();
    
        return redirect()->route('activities.index', ['lang' => $lang])
            ->with('success', __('Activity updated successfully!'));
    }
    
    public function destroy($lang, Activity $about)
    {
        foreach ($about->images as $image) {
            $path = str_replace(asset(''), public_path(), $image->url);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        $about->images()->delete();
        $about->delete();
    
        return redirect()->route('activities.index', ['lang' => $lang])
            ->with('success', __('Activity deleted successfully!'));
    }

    public function show($lang, Activities $activity)
    {
        return view('activities.show', compact('activity'));
    }
}
