<?php

/**
 * IMPORTANT TO KNOW!
 * Sometimes we call Cache using full namespace because the facade doesn't work when helper is called inside the ServiceProviders
 *
 *
 * Cached Data are stored under the following directory:
 * /storage/framework/cache/data/
 *
 */

if (!function_exists('forget_cache')) {
    /**
     * Forget cache for all locales  ['cache_key'. '.' . $locale]
     * @param string $key
     */
    function forget_cache(string $key)
    {
        App\Models\Cms\Locale::get()->each(function ($locale, $i) use ($key) {
            Cache::forget($key . '.' . $locale->reference);
        });
    }
}


if (!function_exists('get_cached_active_locales')) {
    function get_cached_active_locales()
    {
        return Illuminate\Support\Facades\Cache::remember('active_locales',
            config('cms.cache_lifetime.active_locales'), function () {
                if (Schema::hasTable((new App\Models\Cms\Locale)->getTable())) {
                    return App\Models\Cms\Locale::whereIsActive(true)
                        ->get()
                        ->mapWithKeys(function ($locale) {
                            return [
                                $locale->reference => [
                                    'name' => $locale->name,
                                    'is_rtl' => $locale->is_rtl,
                                    //'is_default' => $locale->is_default,
                                ]
                            ];
                        })->toArray();
                }
                return [config('app.locale')];
            });
    }
}


if (!function_exists('get_translatable_locales')) {
    /**
     * Returns an array of locales as declared in config/translatable.php Example: ['en', 'fr', 'ar']
     * @return array
     */
    function get_translatable_locales()
    {
        return Illuminate\Support\Facades\Cache::remember('translatable_locales',
            1440, function () {
                return array_keys(get_cached_active_locales());
            });
    }
}


if (!function_exists('get_cached_active_locales_number')) {
    /**
     * Returns an array of locales as declared in config/translatable.php Example: ['en', 'fr', 'ar']
     * @return array
     */
    function get_cached_active_locales_number()
    {
        return Illuminate\Support\Facades\Cache::remember('active_locales_number',
            1440, function () {
                return count(array_keys(get_cached_active_locales()));
            });
    }
}


if (!function_exists('get_cached_default_locale')) {
    function get_cached_default_locale()
    {
        return Illuminate\Support\Facades\Cache::remember('default_locale',
            config('cms.cache_lifetime.default_locale'), function () {
                return \App\Models\Cms\Locale::whereIsDefault(1)->first()->reference ?? config('app.locale');
            });
    }
}


if (!function_exists('get_cached_permission_name_for_route_name')) {
    /**
     * Check if permission is set for the given route
     * @param null $route_name
     * @return mixed null|array|string
     */
    function get_cached_permission_name_for_route_name($route_name)
    {
        $permissions_route_names = Cache::remember('permissions_route_names',
            config('cms.cache_lifetime.permission_name_for_route_name'), function () {
                return App\Models\Cms\PermissionRouteName::with('permission')->get();
            });

        if ($permissions_route_names->where('route_name', $route_name)->first()) {
            return $permissions_route_names->where('route_name', $route_name)->first()->permission->name;
        }

        return false;
    }
}


if (!function_exists('get_cached_menus')) {
    /**
     * Important to know that we store separate cache for every locale  [localePrefix_cachedElementName]
     * => because we use [->withTranslation()] to get only the current locale from translations
     *
     * @param $reference
     * @return mixed
     */
    function get_cached_menus($reference)
    {
        return Cache::remember('menus.' . $reference . '.' . locale(), config('cms.cache_lifetime.menus'),
            function () use ($reference) {
                $menu_group = App\Models\Cms\MenuGroup::where('reference', $reference)
                    ->with([
                        'menus' => function ($query) {
                            $query->whereIsActive(true)
                                ->orderBy('order')
                                ->withTranslation()
                                ->with([
                                    'link_type',
                                    'page' => function ($query) {
                                        $query->withTranslation();
                                    },
                                    'module' => function ($query) {
                                        $query->withTranslation();
                                    },
                                ]);
                        },
                    ])->first();

                return $menu_group->menus ?? collect();
            });
    }
}


if (!function_exists('get_cached_partners')) {
    function get_cached_partners()
    {
        return Cache::remember(locale() . '_partners', config('cms.cache_lifetime.partners'),
            function () {
                $partners = App\Models\Cms\Partner::whereIsActive(true)
                    ->orderBy('order')
                    ->withTranslation()->get();
                return $partners;
            });
    }
}


if (!function_exists('get_cached_parameters')) {
    /**
     * @param null $reference
     * @return mixed null|array|string
     */
    function get_cached_parameters($reference = null)
    {
        $parameters = Illuminate\Support\Facades\Cache::remember('parameters.' . $reference, config('cms.cache_lifetime.parameters'),
            function () {
                if (Schema::hasTable((new App\Models\Cms\Parameter)->getTable())) {

                    $parameters = App\Models\Cms\Parameter::select('reference', 'value')->get();
                    // Format $parameters as key/value pairs
                    return $parameters->mapWithKeys(function ($item) {
                        return [$item['reference'] => $item['value']];
                    });

                }
            });

        if (!$reference) {
            return $parameters;
        }

        return $parameters[$reference] ?? null; // If reference doesn't exist : return null
    }
}


if (!function_exists('get_cached_parameter_group')) {
    /**
     * @param string $reference parameter group reference (snake_case)
     * @return array
     */
    function get_cached_parameter_group(string $reference)
    {
        return Illuminate\Support\Facades\Cache::remember('parameter_group.' . $reference,
            config('cms.cache_lifetime.parameter_group'),
            function () use ($reference) {

                if (Schema::hasTable((new App\Models\Cms\Parameter)->getTable())) {

                    return App\Models\Cms\Parameter::whereHas('parameter_group', function ($query) use ($reference) {
                        $query->whereReference($reference);
                    })->get()->pluck('value', 'reference');

                }

                return null;
            }
        );
    }
}


if (!function_exists('forget_cached_widgets')) {
    function forget_cached_widgets()
    {
        $menus = App\Models\Cms\Menu::get();

        foreach ($menus as $menu) {
            foreach (get_translatable_locales() as $locale) {
                foreach (config('widgets.placement') as $placement) {
                    Cache::forget($placement . '_widgets.' . $locale . '.' . $menu->id);
                }
            }
        }
    }
}
