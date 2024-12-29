<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use App\Models\Language;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-homepages')->only('index');
        $this->middleware('permission:edit-homepages')->only(['update']);
    }

    public function index($lang)
    {
        $homepage = Homepage::firstOrCreate([],[
            'about_title' => [],
            'about_content' => [],
            'about_link' => '',
            'randd_title' => [],
            'randd_content' => [],
            'doctor_title' => [],
            'doctor_content' => [],
            'doctor_link' => '',
            'news_section' => ''
        ]);
        $languages = Language::all();
        return view('homepages.index', compact('homepage', 'languages'));
    }

    public function update(Request $request, $lang, Homepage $homepage) 
    {
        foreach ($request->input('translations', []) as $locale => $data) {
            $homepage->setTranslation('about_title', $locale, $data['about_title']);
            $homepage->setTranslation('about_content', $locale, $data['about_content']);
            $homepage->setTranslation('randd_title', $locale, $data['randd_title']);
            $homepage->setTranslation('randd_content', $locale, $data['randd_content']);
            $homepage->setTranslation('doctor_title', $locale, $data['doctor_title']);
            $homepage->setTranslation('doctor_content', $locale, $data['doctor_content']);
        }
        
        $homepage->about_link = $request->about_link;
        $homepage->doctor_link = $request->doctor_link;
        $homepage->news_section = $request->news_section;
        $homepage->save();
    
        return redirect()->route('homepages.index', ['lang' => $lang])
            ->with('success', __('Homepage updated successfully!'));
    }
}
