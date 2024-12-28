<?php

namespace App\Http\Controllers\frontpage;

use App\Models\Faq;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageFaqContactController extends Controller
{
    public function faq()
    {
        $faqs = Faq::all();
        return view('frontpage.faq_contact.faq',compact('faqs'));
    }

    public function contact($lang)
    {
        $contact = Contact::first();
        return view('frontpage.faq_contact.contact', compact('contact'));
    }
}
