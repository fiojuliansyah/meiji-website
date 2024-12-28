<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Models\Language;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index($lang)
    {
        $general = General::firstOrCreate([],[
            'favicon' => '',
            'logo' => '',
            'logo_white' => '',
            'name' => '',
            'phone_1' => '',
            'phone_2' => '',
            'email' => '',
            'fax' => '',
            'address' => '',
            'short_address' => '',
            'bio' => []
        ]);
        $languages = Language::all();
        return view('generals.index', compact('general', 'languages'));
    }

    public function update(Request $request, $lang, General $general) 
    {
        $request->validate([
            'favicon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo_white' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('favicon')) {
            if ($general->favicon) {
                Storage::delete($general->favicon);
            }
            $general->favicon = $request->file('favicon')->store('public/generals');
        }

        if ($request->hasFile('logo')) {
            if ($general->logo) {
                Storage::delete($general->logo);
            }
            $general->logo = $request->file('logo')->store('public/generals');
        }

        if ($request->hasFile('logo_white')) {
            if ($general->logo_white) {
                Storage::delete($general->logo_white);
            }
            $general->logo_white = $request->file('logo_white')->store('public/generals');
        }

        foreach ($request->input('translations', []) as $locale => $data) {
            $general->setTranslation('bio', $locale, $data['bio']);
        }
        
        $general->phone_1 = $request->phone_1;
        $general->phone_2 = $request->phone_2;
        $general->name = $request->name;
        $general->email = $request->email;
        $general->fax = $request->fax;
        $general->address = $request->address;
        $general->short_address = $request->short_address;
        $general->save();
    
        return redirect()->route('generals.index', ['lang' => $lang])
            ->with('success', __('General updated successfully!'));
    }
}
