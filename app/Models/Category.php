<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['slug', 'name'];

    protected $casts = [
        'slug' => 'array',
        'name' => 'array',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
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
