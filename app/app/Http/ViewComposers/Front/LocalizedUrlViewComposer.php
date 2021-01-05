<?php

namespace App\Http\ViewComposers\Front;

use App\Models\Cms\Menu;
use Illuminate\Contracts\View\View;
use App\Services\Cms\CmsUrl;

class LocalizedUrlViewComposer
{
    public function compose(View $view)
    {
        // Todo: Check localizedUrls when autoredirect to default locale is disabled

        $localizedUrls = [];

        if ($menu = CmsUrl::getMenu()) {

            $menuTranslations = $menu->translations->keyBy('locale');
            $moduleElementTranslations = $this->translatedModuleElement($menu);

            foreach (config('translatable.locales') as $locale) {
                if (isset($menuTranslations[$locale], $menuTranslations[$locale]->slug)) {
                    $localizedUrls[$locale] = url($locale . '/' . $menuTranslations[$locale]->slug);
                }
                if (isset($moduleElementTranslations[$locale], $moduleElementTranslations[$locale]->slug)) {
                    $localizedUrls[$locale] .= '/' . $moduleElementTranslations[$locale]->slug;
                }
            }

            $view->with(compact('localizedUrls'));

        } else {

            foreach (config('translatable.locales') as $locale) {
                $localizedUrls[$locale] = $locale == config('app.locale') ? locale_prefix() : $locale;
            }

            $view->with(compact('localizedUrls'));
        }

        /*dump([
            $menu->module->main_model,
            $localizedUrls,
            $moduleElementTranslations->toArray(),
        ]);*/
    }

    /**
     * Module element example: http://cms-laravel.test/en/faq-module-menu/faq-module-element
     * @param Menu $menu
     * @return null
     */
    public function translatedModuleElement(Menu $menu)
    {
        $moduleElementSlug = CmsUrl::getModuleElementSlug();

        if ($moduleElementSlug && isset($menu->module->main_model)) {

            $mainModel = $menu->module->main_model;

            $moduleElementTranslation = $mainModel::select('id')->whereHas('translations',
                function ($query) use ($moduleElementSlug) {
                    $query->select('slug')->whereSlug($moduleElementSlug)->whereLocale(locale());
                })->first();

            if (isset($moduleElementTranslation->translations)) {
                return $moduleElementTranslation->translations->keyBy('locale');
            }

            return null;
        }
    }
}
