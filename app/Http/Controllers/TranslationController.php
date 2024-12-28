<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TranslationController extends Controller
{
    public function index($lang, $id)
    {
        $language = Language::findOrFail($id);
        $translations = Translation::where('language_id', $id)->with('language')->get();
        return view('languages.translations.index', compact('translations', 'language'));
    }
    

    public function updateMultiple($lang, Request $request)
    {
        $translations = $request->input('translations');
        
        foreach ($translations as $id => $translationText) {
            $translation = Translation::findOrFail($id);
            $translation->update([
                'translation' => $translationText
            ]);
        }
        
        return redirect()->route('languages.translations', ['lang' => $lang, 'id' => $translation->language_id])
            ->with('success', 'Translations updated successfully!');
    }    
}
