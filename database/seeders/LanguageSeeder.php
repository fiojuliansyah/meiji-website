<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Translation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LanguageSeeder extends Seeder
{
    public function run()
    {
        // Buat bahasa
        $english = Language::create(['code' => 'en', 'name' => 'English', 'is_default' => true]);
        $indonesian = Language::create(['code' => 'id', 'name' => 'Bahasa Indonesia', 'is_default' => false]);

        // Tambahkan terjemahan untuk sidebar
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
            ['key' => 'Settings', 'en' => 'Settings', 'id' => 'Pengaturan', 'group' => 'sidebar'],
            ['key' => 'General', 'en' => 'General', 'id' => 'Umum', 'group' => 'sidebar'],
            ['key' => 'Language', 'en' => 'Language', 'id' => 'Bahasa', 'group' => 'sidebar'],
        ];

        // Simpan terjemahan
        foreach ($translations as $translation) {
            Translation::create([
                'key' => $translation['key'],
                'translation' => $translation['en'],
                'language_id' => $english->id,
                'group' => $translation['group'],
            ]);

            Translation::create([
                'key' => $translation['key'],
                'translation' => $translation['id'],
                'language_id' => $indonesian->id,
                'group' => $translation['group'],
            ]);
        }
    }
}
