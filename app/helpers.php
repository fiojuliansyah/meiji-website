<?php

if (!function_exists('translate')) {
    function translate($key, $locale = null) {
        return \App\Helpers\TranslationHelper::getTranslation($key, $locale);
    }
}

if (!function_exists('localized_route')) {
    function localized_route($routeName, $parameters = [])
    {
        $locale = app()->getLocale();
        return route($routeName, array_merge(['lang' => $locale], $parameters));
    }
}