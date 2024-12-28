<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Language;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index($lang)
    {
    $contact = Contact::firstOrCreate([],[
        'map_url' => '',
        'title' => [],
        'content' => []
    ]);
    $languages = Language::all();
    return view('contacts.index', compact('contact', 'languages'));
    }

    public function update(Request $request, $lang, Contact $contact) 
    {
        // Memproses terjemahan
        foreach ($request->input('translations', []) as $locale => $data) {
            $contact->setTranslation('title', $locale, $data['title']);
            $contact->setTranslation('content', $locale, $data['content']);
        }
        
        // Perbaiki akses properti request
        // Dari $request=>map menjadi $request->map
        $contact->map_url = $request->map_url;
        $contact->save();
    
        // Perbaiki typo pada nama route 'contants' menjadi 'contacts'
        return redirect()->route('contacts.index', ['lang' => $lang])
            ->with('success', __('About updated successfully!'));
    }
}