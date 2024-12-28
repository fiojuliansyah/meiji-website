<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Translation;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('languages.index', compact('languages'));
    }

    public function create()
    {
        return view('languages.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:10|unique:languages,code',
            'name' => 'required|string|max:255',
        ]);

        $language = Language::create($validated);

        // $defaultTranslationKeys = [
        //     'welcome',
        //     'dashboard',
        // ];

        // foreach ($defaultTranslationKeys as $key) {
        //     Translation::create([
        //         'key' => $key,
        //         'language_id' => $language->id,
        //         'translation' => '',
        //     ]);
        // }

        return redirect()->route('languages.index');
    }

    public function edit($lang, $id)
    {
        $language = Language::findOrFail($id);
        return view('languages.edit', compact('language'));
    }

    public function update($lang, Request $request, $id)
    {
        $language = Language::findOrFail($id);

        $validated = $request->validate([
            'code' => 'required|string|max:10|unique:languages,code,' . $language->id,
            'name' => 'required|string|max:255',
        ]);

        $language->update($validated);
        return redirect()->route('languages.index');
    }

    public function destroy($lang, $id)
    {
        $language = Language::findOrFail($id);
        $language->delete();
        
        return redirect()->route('languages.index')
            ->with('success', 'Language deleted successfully');
    }
}
