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
        $english = Language::create(['code' => 'en', 'name' => 'English', 'is_default' => false]);
        $indonesian = Language::create(['code' => 'id', 'name' => 'Bahasa Indonesia', 'is_default' => true]);

        // Sidebar group translations
        Translation::create(['key' => 'Dashboard', 'translation' => 'Dashboard', 'language_id' => $english->id, 'group' => 'sidebar']);
        Translation::create(['key' => 'Dashboard', 'translation' => 'Beranda', 'language_id' => $indonesian->id, 'group' => 'sidebar']);

        Translation::create(['key' => 'Settings', 'translation' => 'Settings', 'language_id' => $english->id, 'group' => 'sidebar']);
        Translation::create(['key' => 'Settings', 'translation' => 'Pengaturan', 'language_id' => $indonesian->id, 'group' => 'sidebar']);

        // Dashboard page translations
        Translation::create(['key' => 'Welcome', 'translation' => 'Welcome', 'language_id' => $english->id, 'group' => 'dashboard']);
        Translation::create(['key' => 'Welcome', 'translation' => 'Selamat datang', 'language_id' => $indonesian->id, 'group' => 'dashboard']);

        Translation::create(['key' => 'Analytics', 'translation' => 'Analytics', 'language_id' => $english->id, 'group' => 'dashboard']);
        Translation::create(['key' => 'Analytics', 'translation' => 'Analitik', 'language_id' => $indonesian->id, 'group' => 'dashboard']);
    }
}
