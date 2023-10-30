<?php
use App\Models\Lang;
if (!function_exists('Translate')) {
    $variableLang = [];


    function Translate($key)
    {
        global $variableLang;
        
        $currentLocale = app()->getLocale();
        
        if (empty($variableLang)) {
            $variableLang = Lang::get()->pluck($currentLocale, 'key')->toArray();
        }
        
        if (!empty($variableLang)) {
            if (array_key_exists($key, $variableLang)) {
                return $variableLang[$key];
            } else {
                return $key;
            }
        }
    }
}