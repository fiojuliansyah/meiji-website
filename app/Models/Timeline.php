<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Timeline extends Model
{
    protected $fillable = ['year', 'image', 'title', 'content', 'is_published'];

    protected $casts = [
        'title' => 'array',
        'content' => 'array',
    ];
    
    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::url($this->image) : null;
    }

    public function getTranslation($attribute, $locale)
    {
        $translations = $this->{$attribute};
        return $translations[$locale] ?? null;
    }

    public function setTranslation($attribute, $locale, $value)
    {
        $translations = $this->{$attribute} ?? [];
        $translations[$locale] = $value;
        $this->{$attribute} = $translations;
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($timeline) {
            if ($timeline->image) {
                Storage::delete($timeline->image);
            }
        });
    }
}