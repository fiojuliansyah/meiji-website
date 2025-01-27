<?php

namespace App\Http\Controllers\frontpage;

use App\Models\About;
use App\Models\Timeline;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageAboutController extends Controller
{
    public function show($lang, $slug)
    {
        $about = About::whereJsonContains('slug->' . app()->getLocale(), $slug)->firstOrFail();
        return view('frontpage.about.show', compact('about'));
    }

    public function timeline($lang)
    {
        $timelines = Timeline::where('is_published', true)->get();
        return view('frontpage.about.timeline', compact('timelines'));
    }
}
