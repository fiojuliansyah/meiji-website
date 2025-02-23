<?php

namespace App\Http\Controllers;

use App\Models\Timeline;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TimelineController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-timelines')->only('index');
        $this->middleware('permission:create-timelines')->only(['create', 'store']);
        $this->middleware('permission:edit-timelines')->only(['edit', 'update']);
        $this->middleware('permission:delete-timelines')->only('destroy');
    }

    public function index()
    {
        $timelines = Timeline::all();
        return view('timelines.index', compact('timelines'));
    }

    public function create($lang)
    {
        $languages = Language::All();
        return view('timelines.create', compact('languages'));
    }

    public function store($lang, Request $request)
    {
        $request->validate([
            'year' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('public/timelines');

        $timeline = Timeline::create([
            'year' => $request->year,
            'image' => $imagePath,
            'title' => [],
            'content' => [],
        ]);

        foreach ($request->input('translations', []) as $locale => $data) {
            $timeline->setTranslation('title', $locale, $data['title']);
            $timeline->setTranslation('content', $locale, $data['content']);
        }

        $timeline->save();

        return redirect()->route('timelines.index')->with('success', __('Timeline created successfully!'));
    }

    public function show($lang, Timeline $timeline)
    {
        $languages = Language::All();
        return view('timelines.show', compact('timeline', 'languages'));
    }

    public function edit($lang, Timeline $timeline)
    {
        $languages = Language::All();
        return view('timelines.edit', compact('timeline', 'languages'));
    }

    public function update($lang, Request $request, Timeline $timeline)
    {
        $request->validate([
            'year' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $timeline->year = $request->year;

        if ($request->hasFile('image')) {
            if ($timeline->image) {
                Storage::delete($timeline->image);
            }
            $timeline->image = $request->file('image')->store('public/timelines');
        }

        foreach ($request->input('translations', []) as $locale => $data) {
            $timeline->setTranslation('title', $locale, $data['title']);
            $timeline->setTranslation('content', $locale, $data['content']);
        }
        
        $timeline->save();

        return redirect()->route('timelines.index')->with('success', __('Timeline updated successfully!'));
    }
    
    public function destroy($lang, Timeline $timeline)
    {
        if ($timeline->image) {
            Storage::delete($timeline->image);
        }
        $timeline->delete();

        return redirect()->route('timelines.index')->with('success', __('Timeline deleted successfully!'));
    }
}