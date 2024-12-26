<?php

namespace App\Helpers;

use App\Models\Translation;

class TranslationHelper
{
    public static function getTranslation($key, $language = null)
    {
        $language = $language ?: app()->getLocale();
        $translation = Translation::where('key', $key)
                                  ->whereHas('language', function($query) use ($language) {
                                      $query->where('code', $language);
                                  })
                                  ->first();

        return $translation ? $translation->translation : $key;
    }
}



