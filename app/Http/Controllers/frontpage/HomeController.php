<?php

namespace App\Http\Controllers\frontpage;

use App\Models\News;
use App\Models\Slider;
use App\Models\Timeline;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
     public function index()
     {
          $sliders = Slider::all();
          return view('frontpage.home',compact('sliders'));
     }
}