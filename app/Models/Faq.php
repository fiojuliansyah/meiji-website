<?php

namespace App\Models;

use App\Models\Traits\TranslatableSlug;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use TranslatableSlug;
    
    protected $fillable = ['slug', 'title', 'content'];

    protected $casts = [
        'slug' => 'array',
        'title' => 'array',
        'content' => 'array',
    ];
    
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * Get translation for a given locale.
     */
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
