<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-sliders')->only('index');
        $this->middleware('permission:create-sliders')->only(['create', 'store']);
        $this->middleware('permission:edit-sliders')->only(['edit', 'update']);
        $this->middleware('permission:delete-sliders')->only('destroy');
    }

    public function index()
    {
        $sliders = Slider::all();
        return view('sliders.index', compact('sliders'));
    }

    public function create($lang)
    {
        $languages = Language::All();
        return view('sliders.create',compact('languages'));
    }

    public function store($lang, Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('public/sliders');

        $slider = Slider::create([
            'image' => $imagePath,
            'title' => [],
            'content' => [],
        ]);

        foreach ($request->input('translations', []) as $locale => $data) {
            $slider->setTranslation('title', $locale, $data['title']);
            $slider->setTranslation('content', $locale, $data['content']);
        }

        $slider->save();
        $approvalTypes = [1, 2, 3, 4, 5, 6]; // ID jenis approval
        foreach ($approvalTypes as $typeId) {
            $slider->requiredApprovals()->create(['approval_type_id' => $typeId]);
        }

        return redirect()->route('sliders.index')->with('success', __('Slider created successfully!'));
    }

    public function show($lang, Slider $slider)
    {
        $languages = Language::All();
        return view('sliders.show', compact('slider','languages'));
    }

    public function edit($lang, Slider $slider)
    {
        $languages = Language::All();
        return view('sliders.edit', compact('slider','languages'));
    }

    public function update($lang, Request $request, Slider $slider)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($slider->image) {
                Storage::delete($slider->image);
            }
            $slider->image = $request->file('image')->store('public/sliders');
        }

        foreach ($request->input('translations', []) as $locale => $data) {
            $slider->setTranslation('title', $locale, $data['title']);
            $slider->setTranslation('content', $locale, $data['content']);
        }

        $slider->approvals()->delete();

        $approvalTypes = [1, 2, 3, 4, 5, 6];
        $slider->requiredApprovals()->delete();
        foreach ($approvalTypes as $typeId) {
            $slider->requiredApprovals()->create(['approval_type_id' => $typeId]);
        }

        $slider->save();

        return redirect()->route('sliders.index')->with('success', __('Slider updated successfully!'));
    }
    
    public function destroy($lang, Slider $slider)
    {
        if ($slider->image) {
            Storage::delete($slider->image);
        }
        $slider->delete();

        return redirect()->route('sliders.index')->with('success', __('Slider deleted successfully!'));
    }
}
