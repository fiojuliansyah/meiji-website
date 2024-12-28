<?php

namespace App\Http\Controllers\frontpage;

use App\Models\Randd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageRanddController extends Controller
{
    public function show($lang, $slug)
    {
        $randd = Randd::whereJsonContains('slug->' . app()->getLocale(), $slug)->firstOrFail();
        return view('frontpage.randds.show', compact('randd'));
    }
}
