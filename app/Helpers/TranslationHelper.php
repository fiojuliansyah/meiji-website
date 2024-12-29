<?php

namespace App\Helpers;

use App\Models\Translation;

class TranslationHelper
{
    public static function getTranslation($key, $locale = null)
    {
        $locale = $locale ?? app()->getLocale();

        $languageId = \App\Models\Language::where('code', $locale)->value('id');

        return Translation::where('key', $key)
            ->where('language_id', $languageId)
            ->value('translation') ?? $key;
    }
}



