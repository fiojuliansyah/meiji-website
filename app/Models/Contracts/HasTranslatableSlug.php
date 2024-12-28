<?php

namespace App\Models\Contracts;

interface HasTranslatableSlug
{
    public function getTranslation($field, $locale);
    public function setTranslation($field, $locale, $value);
}
