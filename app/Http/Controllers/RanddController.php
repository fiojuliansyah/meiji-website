<?php

namespace App\Http\Controllers;

use App\Models\Randd;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ApprovalModule;

class RanddController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-randds')->only('index');
        $this->middleware('permission:create-randds')->only(['create', 'store']);
        $this->middleware('permission:edit-randds')->only(['edit', 'update']);
        $this->middleware('permission:delete-randds')->only('destroy');
    }
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
             'date_publsihed' => $request->date_published,
             'end_date' => $request->end_date,
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

         $approvalModule = ApprovalModule::find(6) ?? ApprovalModule::find(1);

         $approvalTypes = $approvalModule->pluck('id');

         foreach ($approvalTypes as $typeId) {
             $randd->requiredApprovals()->create(['approval_type_id' => $typeId]);
         }
     
         return redirect()->route('randds.index', ['lang' => $lang])
             ->with('success', __('Randd created successfully!'));
     }

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
            
            preg_match_all('/<img[^>]+src=([\'"])?((.*?)\1)/i', $data['content'], $matches);
            
            if (!empty($matches[2])) {
                $randd->images()->delete();
                
                foreach ($matches[2] as $imageUrl) {
                    $randd->images()->create([
                        'url' => $imageUrl
                    ]);
                }
            }
        }

        $randd->date_published = $request->date_published;
        $randd->end_date = $request->end_date;
        $randd->is_published = $request->is_published;
        
        $randd->approvals()->delete();

        $approvalModule = ApprovalModule::find(6) ?? ApprovalModule::find(1);

        $approvalTypes = $approvalModule->pluck('id');
        
        $randd->requiredApprovals()->delete();
        foreach ($approvalTypes as $typeId) {
            $randd->requiredApprovals()->create(['approval_type_id' => $typeId]);
        }

        $randd->save();
    
        return redirect()->route('randds.index', ['lang' => $lang])
            ->with('success', __('Randd updated successfully!'));
    }
    
    public function destroy($lang, Randd $randd)
    {
        foreach ($randd->images as $image) {
            $path = str_replace(asset(''), public_path(), $image->url);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        $randd->images()->delete();
        $randd->delete();
    
        return redirect()->route('randds.index', ['lang' => $lang])
            ->with('success', __('Randd deleted successfully!'));
    }

    public function show($lang, Randd $randd)
    {
        return view('randds.show', compact('randd'));
    }
}