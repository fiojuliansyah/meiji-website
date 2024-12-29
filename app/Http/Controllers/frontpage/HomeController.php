<?php

namespace App\Http\Controllers\frontpage;

use App\Models\News;
use App\Models\Page;
use App\Models\Slider;
use App\Models\Homepage;
use App\Models\Timeline;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
     public function index($lang)
     {
          $page = Homepage::first();
          $news = News::all();
          $sliders = Slider::all();
          return view('frontpage.home',compact('sliders','news','page'));
     }

     public function show($lang, $slug)
     {
         $page = Page::whereJsonContains('slug->' . app()->getLocale(), $slug)->firstOrFail();
         return view('frontpage.page.show', compact('page'));
     }
}