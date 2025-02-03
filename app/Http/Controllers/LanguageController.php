<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Translation;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-languages')->only('index');
        $this->middleware('permission:create-languages')->only(['create', 'store']);
        $this->middleware('permission:edit-languages')->only(['edit', 'update']);
        $this->middleware('permission:delete-languages')->only('destroy');
    }

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
        // Validasi input
        $validated = $request->validate([
            'code' => 'required|string|max:10|unique:languages,code',
            'name' => 'required|string|max:255',
        ]);
    
        $language = Language::create($validated);
    
        $defaultTranslationKeys = [
            'welcome',
            'dashboard',
        ];
    
        foreach ($defaultTranslationKeys as $key) {
            Translation::create([
                'key' => $key,
                'language_id' => $language->id,
                'translation' => '',
            ]);
        }
    
        $translations = [
            ['key' => 'Home', 'en' => 'Home', 'id' => 'Beranda', 'group' => 'header'],
            ['key' => 'About Us', 'en' => 'About Us', 'id' => 'Tentang Kami', 'group' => 'header'],
            ['key' => 'Company History', 'en' => 'Company History', 'id' => 'Sejarah Perusahaan', 'group' => 'header'],
            ['key' => 'News', 'en' => 'News', 'id' => 'Berita', 'group' => 'header'],
            ['key' => 'Products', 'en' => 'Products', 'id' => 'Produk', 'group' => 'header'],
            ['key' => 'R&D', 'en' => 'R&D', 'id' => 'R&D', 'group' => 'header'],
            ['key' => 'Activity', 'en' => 'Activity', 'id' => 'Aktivitas', 'group' => 'header'],
            ['key' => 'Career', 'en' => 'Career', 'id' => 'Karir', 'group' => 'header'],
            ['key' => 'Job Portal', 'en' => 'Job Portal', 'id' => 'Portal Pekerjaan', 'group' => 'header'],
            ['key' => 'Contact', 'en' => 'Contact', 'id' => 'Kontak', 'group' => 'header'],
            
            ['key' => 'Dashboard', 'en' => 'Dashboard', 'id' => 'Beranda', 'group' => 'sidebar'],
            ['key' => 'Sliders', 'en' => 'Sliders', 'id' => 'Slider', 'group' => 'sidebar'],
            ['key' => 'Abouts', 'en' => 'Abouts', 'id' => 'Tentang Kami', 'group' => 'sidebar'],
            ['key' => 'Timelines', 'en' => 'Timelines', 'id' => 'Linimasa', 'group' => 'sidebar'],
            ['key' => 'News', 'en' => 'News', 'id' => 'Berita', 'group' => 'sidebar'],
            ['key' => 'Categories', 'en' => 'Categories', 'id' => 'Kategori', 'group' => 'sidebar'],
            ['key' => 'Products', 'en' => 'Products', 'id' => 'Produk', 'group' => 'sidebar'],
            ['key' => 'Product', 'en' => 'Product', 'id' => 'Produk', 'group' => 'sidebar'],
            ['key' => 'R&D', 'en' => 'R&D', 'id' => 'R&D', 'group' => 'sidebar'],
            ['key' => 'Activities', 'en' => 'Activities', 'id' => 'Aktivitas', 'group' => 'sidebar'],
            ['key' => 'Faqs', 'en' => 'FAQs', 'id' => 'Tanya Jawab', 'group' => 'sidebar'],
            ['key' => 'Contacts', 'en' => 'Contacts', 'id' => 'Kontak', 'group' => 'sidebar'],
            ['key' => 'Page', 'en' => 'Page', 'id' => 'Halaman', 'group' => 'sidebar'],
            ['key' => 'Inbox', 'en' => 'Inbox', 'id' => 'Kotak Masuk', 'group' => 'sidebar'],
            ['key' => 'Pages', 'en' => 'Pages', 'id' => 'Halaman', 'group' => 'sidebar'],
            ['key' => 'Settings', 'en' => 'Settings', 'id' => 'Pengaturan', 'group' => 'sidebar'],
            ['key' => 'General', 'en' => 'General', 'id' => 'Umum', 'group' => 'sidebar'],
            ['key' => 'Language', 'en' => 'Language', 'id' => 'Bahasa', 'group' => 'sidebar'],
            ['key' => 'Users', 'en' => 'Users', 'id' => 'Pengguna', 'group' => 'sidebar'],
            ['key' => 'Roles', 'en' => 'Roles', 'id' => 'Hak', 'group' => 'sidebar'],
            ['key' => 'Role & Permission', 'en' => 'Role & Permission', 'id' => 'Hak & Akses', 'group' => 'sidebar'],
            
            ['key' => 'Cannot Access', 'en' => 'Cannot Access', 'id' => 'Tidak dapat di Akses', 'group' => 'sidebar'],
            ['key' => 'Page Not Found', 'en' => 'Page Not Found', 'id' => 'Page Tidak Ditemukan', 'group' => 'sidebar'],

            ['key' => 'Read More', 'en' => 'Read More', 'id' => 'Baca Selengkapnya', 'group' => 'front'],
        ];

    
        foreach ($translations as $translation) {
            Translation::create([
                'key' => $translation['key'],
                'language_id' => $language->id,
                'translation' => '',
            ]);
        }
    
        return redirect()->route('languages.index')->with('success', 'Language created successfully with default translations.');
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
