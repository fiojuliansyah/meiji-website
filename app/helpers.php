<?php

if (!function_exists('translate')) {
    function translate($key, $language = null) {
        return \App\Facades\TranslationFacade::getTranslation($key, $language);
    }
}