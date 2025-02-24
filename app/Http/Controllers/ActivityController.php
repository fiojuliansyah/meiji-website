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
         $activity = Activity::create([
             'slug' => [],
             'title' => [],
             'content' => [],
             'date_publsihed' => $request->date_published,
             'end_date' => $request->end_date,
         ]);
     
         foreach ($request->input('translations', []) as $locale => $data) {
             $activity->setTranslation('title', $locale, $data['title']);
             $activity->setTranslation('content', $locale, $data['content']);
             $activity->setTranslation('slug', $locale, Str::slug($data['title']));
             
             preg_match_all('/<img[^>]+src=([\'"])?((.*?)\1)/i', $data['content'], $matches);
             
             if (!empty($matches[2])) {
                 foreach ($matches[2] as $imageUrl) {
                     $activity->images()->create([
                         'url' => $imageUrl
                     ]);
                 }
             }
         }
     
         $activity->save();

         $approvalModule = ApprovalModule::find(2) ?? ApprovalModule::find(1);

         $approvalTypes = $approvalModule->pluck('id');

         foreach ($approvalTypes as $typeId) {
             $activity->requiredApprovals()->create(['approval_type_id' => $typeId]);
         }
     
         return redirect()->route('activities.index', ['lang' => $lang])
             ->with('success', __('Activity created successfully!'));
     }

    
    public function edit($lang, Activity $activity)
    {
        $languages = Language::all();
        return view('activities.edit', compact('activity', 'languages'));
    }
    
    public function update($lang, Request $request, Activity $activity)
    {
        foreach ($request->input('translations', []) as $locale => $data) {
            $activity->setTranslation('title', $locale, $data['title']);
            $activity->setTranslation('content', $locale, $data['content']);
            $activity->setTranslation('slug', $locale, Str::slug($data['title']));
            
            preg_match_all('/<img[^>]+src=([\'"])?((.*?)\1)/i', $data['content'], $matches);
            
            if (!empty($matches[2])) {
                $activity->images()->delete();
                
                foreach ($matches[2] as $imageUrl) {
                    $activity->images()->create([
                        'url' => $imageUrl
                    ]);
                }
            }
        }

        $activity->date_published = $request->date_published;
        $activity->end_date = $request->end_date;
        $activity->is_published = $request->is_published;

        $activity->approvals()->delete();

        $approvalModule = ApprovalModule::find(2) ?? ApprovalModule::find(1);

        $approvalTypes = $approvalModule->pluck('id');
        
        $activity->requiredApprovals()->delete();
        foreach ($approvalTypes as $typeId) {
            $activity->requiredApprovals()->create(['approval_type_id' => $typeId]);
        }

        $activity->save();
    
        return redirect()->route('activities.index', ['lang' => $lang])
            ->with('success', __('Activity updated successfully!'));
    }
    
    public function destroy($lang, Activity $activity)
    {
        foreach ($activity->images as $image) {
            $path = str_replace(asset(''), public_path(), $image->url);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        $activity->images()->delete();
        $activity->delete();
    
        return redirect()->route('activities.index', ['lang' => $lang])
            ->with('success', __('Activity deleted successfully!'));
    }

    public function show($lang, Activities $activity)
    {
        return view('activities.show', compact('activity', ['lang' => $lang]));
    }
}
