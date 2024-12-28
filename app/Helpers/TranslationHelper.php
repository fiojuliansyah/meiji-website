<?php

namespace App\Helpers;

use App\Models\Translation;

class TranslationHelper
{
    public static function getTranslation($key, $locale = null)
    {
        $locale = $locale ?? app()->getLocale();

        // Cari language_id berdasarkan locale
        $languageId = \App\Models\Language::where('code', $locale)->value('id');

        // Ambil terjemahan berdasarkan key dan language_id
        return Translation::where('key', $key)
            ->where('language_id', $languageId)
            ->value('translation') ?? $key;
    }
}



