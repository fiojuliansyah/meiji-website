<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Language;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-contacts')->only('index');
        $this->middleware('permission:edit-contacts')->only(['edit', 'update']);
    }

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
        foreach ($request->input('translations', []) as $locale => $data) {
            $contact->setTranslation('title', $locale, $data['title']);
            $contact->setTranslation('content', $locale, $data['content']);
        }
        
        $contact->map_url = $request->map_url;
        $contact->save();
    
        return redirect()->route('contacts.index', ['lang' => $lang])
            ->with('success', __('About updated successfully!'));
    }
}