<?php

namespace App\Models\Traits;

trait TranslatableSlug
{
    public function getTranslation($attribute, $locale, $fallback = true)
    {
        $translations = $this->{$attribute};
        
        if (isset($translations[$locale])) {
            return $translations[$locale];
        }
        
        if ($fallback && isset($translations[config('app.fallback_locale')])) {
            return $translations[config('app.fallback_locale')];
        }
        
        return null;
    }

    public function setTranslation($attribute, $locale, $value)
    {
        $translations = $this->{$attribute} ?? [];
        $translations[$locale] = $value;
        $this->{$attribute} = $translations;
        
        return $this;
    }

    public function hasTranslation($attribute, $locale)
    {
        return isset($this->{$attribute}[$locale]);
    }

    public function getTranslations($attribute)
    {
        return $this->{$attribute} ?? [];
    }
}
