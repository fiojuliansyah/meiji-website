<?php

namespace App\Http\Controllers\frontpage;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageActivityController extends Controller
{
    public function show($lang, $slug)
    {
        $activity = Activity::whereJsonContains('slug->' . app()->getLocale(), $slug)->firstOrFail();

        $activities = Activity::all();
        return view('frontpage.activities.show', compact('activity', 'activities'));
    }
}
