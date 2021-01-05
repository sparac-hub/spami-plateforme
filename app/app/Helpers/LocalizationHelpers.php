<?php

if (!function_exists('locale_direction')) {
    function locale_direction()
    {
        return config('translatable.active_locales.' . locale() . '.is_rtl') ? 'rtl' : 'ltr';
    }
}

if (!function_exists('locale_prefix')) {
    function locale_prefix()
    {
        /* if (count(get_cached_active_locales()) == 1) {
             return '';
         }*/

        if (!app()->redirectDefaultLocale && (app()->getLocale() == get_cached_default_locale())) {
            return '';
        }

        return locale();
    }
}

if (!function_exists('getUrlForLocale')) {
    function getUrlForLocale($locale)
    {
        $route_name = Route::getCurrentRoute()->getName();
        $route_parameters = Route::getCurrentRoute()->parameters();

        $url = route($route_name, $route_parameters);

        return str_replace_first(locale(), $locale, $url);
    }
}
