<?php

namespace App\Http\Controllers\frontpage;

use App\Models\News;
use App\Models\Page;
use App\Models\Slider;
use App\Models\General;
use App\Models\Homepage;
use App\Models\Language;
use App\Models\Timeline;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index($lang)
    {
        $page = Homepage::first();
        $randd = Randd::orderBy('created_at', 'ASC')->get(); 
        $news = News::where('is_published', true)->latest()->get();
        $sliders = Slider::all();
        return view('frontpage.home', compact('sliders', 'news', 'page', 'randd'));
    }
    

     public function show($lang, $slug)
     {
         $page = Page::whereJsonContains('slug->' . app()->getLocale(), $slug)->firstOrFail();
         return view('frontpage.page.show', compact('page'));
     }

     public function install()
     {
           $general = General::first();
           $languages = Language::all();
           return view('firsts.create', compact('languages','general'));
     }

     public function complete(Request $request, General $general) 
     {
         if ($request->hasFile('favicon')) {
             if ($general->favicon) {
                 Storage::delete($general->favicon);
             }
             $general->favicon = $request->file('favicon')->store('public/generals');
         }
 
         if ($request->hasFile('logo')) {
             if ($general->logo) {
                 Storage::delete($general->logo);
             }
             $general->logo = $request->file('logo')->store('public/generals');
         }
 
         if ($request->hasFile('logo_white')) {
             if ($general->logo_white) {
                 Storage::delete($general->logo_white);
             }
             $general->logo_white = $request->file('logo_white')->store('public/generals');
         }
 
         if ($request->hasFile('breadcrumb')) {
             if ($general->breadcrumb) {
                 Storage::delete($general->breadcrumb);
             }
             $general->breadcrumb = $request->file('breadcrumb')->store('public/generals');
         }
 
         foreach ($request->input('translations', []) as $locale => $data) {
             $general->setTranslation('bio', $locale, $data['bio']);
         }
         
         $general->phone_1 = $request->phone_1;
         $general->phone_2 = $request->phone_2;
         $general->name = $request->name;
         $general->email = $request->email;
         $general->fax = $request->fax;
         $general->address = $request->address;
         $general->short_address = $request->short_address;
         $general->save();
     
         return redirect()->route('login')
             ->with('success', __('General updated successfully!'));
     }

     public function changeLanguage(Request $request)
     {
         $newLang = $request->input('lang');
     
         app()->setLocale($newLang);
         session()->put('locale', $newLang);
     
         return redirect()->route('frontpage.home', ['lang' => $newLang]);
     }  
}