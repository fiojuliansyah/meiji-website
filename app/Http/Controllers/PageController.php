<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ApprovalModule;

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
             'date_published' => $request->date_published,
             'end_date' => $request->end_date,
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

         $approvalModule = ApprovalModule::find(4) ?? ApprovalModule::find(1);

         $approvalTypes = $approvalModule->pluck('id');

         foreach ($approvalTypes as $typeId) {
             $page->requiredApprovals()->create(['approval_type_id' => $typeId]);
         }
     
         return redirect()->route('pages.index', ['lang' => $lang])
             ->with('success', __('Page created successfully!'));
     }


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
            
            preg_match_all('/<img[^>]+src=([\'"])?((.*?)\1)/i', $data['content'], $matches);
            
            if (!empty($matches[2])) {
                $page->images()->delete();
                
                foreach ($matches[2] as $imageUrl) {
                    $page->images()->create([
                        'url' => $imageUrl
                    ]);
                }
            }
        }
        
        $page->is_header = $request->is_header ?? null;
        $page->is_footer = $request->is_footer ?? null;
        $page->date_published = $request->date_published;
        $page->end_date = $request->end_date;
        $page->is_published = $request->is_published;

        $page->approvals()->delete();

        $approvalModule = ApprovalModule::find(4) ?? ApprovalModule::find(1);

        $approvalTypes = $approvalModule->pluck('id');
        
        $page->requiredApprovals()->delete();
        foreach ($approvalTypes as $typeId) {
            $page->requiredApprovals()->create(['approval_type_id' => $typeId]);
        }

        $page->save();
    
        return redirect()->route('pages.index', ['lang' => $lang])
            ->with('success', __('Page updated successfully!'));
    }
    
    public function destroy($lang, Page $page)
    {
        foreach ($page->images as $image) {
            $path = str_replace(asset(''), public_path(), $image->url);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        $page->images()->delete();
        $page->delete();
    
        return redirect()->route('pages.index', ['lang' => $lang])
            ->with('success', __('Page deleted successfully!'));
    }

    public function show($lang, Page $page)
    {
        return view('pages.show', compact('page'));
    }
}