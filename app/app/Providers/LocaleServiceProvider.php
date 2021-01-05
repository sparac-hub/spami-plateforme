<?php

namespace App\Providers;

use App\Models\Cms\Locale;
use Illuminate\Support\Str;
use App\Services\Cms\CmsUrl;
use App\Services\Cms\CmsLocale;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class LocaleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setActiveLocales();

        $locale = CmsLocale::determine();

        if (config('cms.redirect_default_locale')) {
            if (!CmsUrl::hasValidLocale()) {
                return $this->redirectToDefaultLocale();
            }
            //config(['cms.locale_prefix' => $locale]);
        }

        $this->app->setLocale($locale);
        // Date::setLocale($locale);
    }

    /**
     * Get all active Locales
     * And Define the default Locale from database (we use cache to minimize db requests)
     * And set them in config('translatables.locales')
     */
    public function setActiveLocales()
    {
        // Check if table exist
        if (Schema::hasTable((new Locale)->getTable())) {
            config(['app.locale' => get_cached_default_locale()]);
            config(['translatable.active_locales' => get_cached_active_locales()]);
            config(['translatable.locales' => get_translatable_locales()]);
        }
    }

    public function redirectToDefaultLocale()
    {
        if ((get_cached_active_locales_number() != 1) && app()->request->segment(1)) { //
            $suggestedUrl = url(locale() . '/' . request()->decodedPath());

            if ($this->excludeUrl(request()->decodedPath())) {
                if ($this->urlIsValid($suggestedUrl)) {
                    return redirect(locale() . '/' . request()->decodedPath(), 301)->send();
                }
            }
        }
    }

    private function excludeUrl($url)
    {
        if (preg_match('/^' . config('lfm.url_prefix') . '/', $url)) {
            return false;
        }

        if (preg_match('/^storage/', $url)) {
            return false;
        }

        return true;
    }

    public function urlIsValid(string $suggestedUrl): bool
    {

        $headers = get_headers($suggestedUrl);

        if (Str::contains($headers[0], '404') || Str::contains($headers[0], '401') || Str::contains($headers[0], '500')) {
            // 'HTTP/1.1 404 Not Found'
            // 'HTTP/1.0 404 Not Found'
            return false;
        }

        // Todo: maybe we'll delete what's next
        if (in_array(request()->segment(1), ['log-viewer', 'secret', 'lfm', config('lfm.url_prefix')])) {
            \Log::debug('LocaleServiceProvider::urlIsValid(): Inside in_array(request()->segment(1)) !!!');
            return false;
        }

        \Log::debug('LocaleServiceProvider::urlIsValid() ', [
            $suggestedUrl,
            $headers,
        ]);

        return true;
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
