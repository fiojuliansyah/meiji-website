<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function index($id)
    {
        $translations = Translation::where('language_id', $id)->with('language')->get();
        $language = Language::findOrFail($id);
    
        return view('languages.translations.index', compact('translations', 'language'));
    }

    public function updateMultiple(Request $request)
    {
        $translations = $request->input('translations');
    
        foreach ($translations as $id => $translationText) {
            $translation = Translation::findOrFail($id);
            $translation->update([
                'translation' => $translationText
            ]);
        }
    
        return redirect()->route('languages.translations', $translation->language_id)
        ->with('success', 'Translations updated successfully!');
    }    
}
