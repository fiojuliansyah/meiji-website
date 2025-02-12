<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ApprovalModule;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-faqs')->only('index');
        $this->middleware('permission:create-faqs')->only(['create', 'store']);
        $this->middleware('permission:edit-faqs')->only(['edit', 'update']);
        $this->middleware('permission:delete-faqs')->only('destroy');
    }
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

         $approvalModule = ApprovalModule::find(4) ?? ApprovalModule::find(1);

         $approvalTypes = $approvalModule->pluck('id');

         foreach ($approvalTypes as $typeId) {
             $faq->requiredApprovals()->create(['approval_type_id' => $typeId]);
         }
     
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
            
            preg_match_all('/<img[^>]+src=([\'"])?((.*?)\1)/i', $data['content'], $matches);
            
            if (!empty($matches[2])) {
                $faq->images()->delete();
                
                foreach ($matches[2] as $imageUrl) {
                    $faq->images()->create([
                        'url' => $imageUrl
                    ]);
                }
            }
        }

        $faq->approvals()->delete();

        $approvalModule = ApprovalModule::find(4) ?? ApprovalModule::find(1);

        $approvalTypes = $approvalModule->pluck('id');
        
        $faq->requiredApprovals()->delete();
        foreach ($approvalTypes as $typeId) {
            $faq->requiredApprovals()->create(['approval_type_id' => $typeId]);
        }
    
        $faq->save();
    
        return redirect()->route('faqs.index', ['lang' => $lang])
            ->with('success', __('Faq updated successfully!'));
    }
    
    public function destroy($lang, Faq $faq)
    {
        foreach ($faq->images as $image) {
            $path = str_replace(asset(''), public_path(), $image->url);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        $faq->images()->delete();
        $faq->delete();
    
        return redirect()->route('faqs.index', ['lang' => $lang])
            ->with('success', __('Faq deleted successfully!'));
    }
}
