<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $fillable = ['slug', 'name'];

    protected $casts = [
        'slug' => 'array',
        'name' => 'array',
    ];

    public function news()
    {
        return $this->hasMany(News::class);
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
}