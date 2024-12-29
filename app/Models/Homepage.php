<?php

namespace App\Models;

use App\Models\Traits\TranslatableSlug;
use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    use TranslatableSlug;
    
    protected $fillable = [
        'about_title',
        'about_content',
        'about_link',
        'randd_title',
        'randd_content',
        'doctor_title',
        'doctor_content',
        'doctor_link',
        'news_section',
    ];

    protected $casts = [
        'about_title' => 'array',
        'about_content' => 'array',
        'randd_title' => 'array',
        'randd_content' => 'array',
        'doctor_title' => 'array',
        'doctor_content' => 'array',
    ];
    
    public function getTranslation($attribute, $locale, $fallback = true)
    {
        $translations = $this->{$attribute};
        
        // If translation exists for requested locale
        if (isset($translations[$locale])) {
            return $translations[$locale];
        }
        
        // If fallback is enabled and default locale translation exists
        if ($fallback && isset($translations[config('app.fallback_locale')])) {
            return $translations[config('app.fallback_locale')];
        }
        
        return null;
    }

    /**
     * Set translation for a given locale.
     */
    public function setTranslation($attribute, $locale, $value)
    {
        $translations = $this->{$attribute} ?? [];
        $translations[$locale] = $value;
        $this->{$attribute} = $translations;
        
        return $this;
    }

    /**
     * Determine if a translation exists for a given locale.
     */
    public function hasTranslation($attribute, $locale)
    {
        return isset($this->{$attribute}[$locale]);
    }

    /**
     * Get all translations for a given attribute.
     */
    public function getTranslations($attribute)
    {
        return $this->{$attribute} ?? [];
    }
}

