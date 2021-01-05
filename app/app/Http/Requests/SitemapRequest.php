<?php

namespace App\Http\Requests;

use App\Models\Cms\SitemapTranslation;
use Illuminate\Foundation\Http\FormRequest;

class SitemapRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route()->parameter('sitemap');

        $rules = [
            'is_active' => 'required',
            //'menu_group_ids' => 'required',
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            $rules[$locale . '.title'] = 'required';
            if (request()->method() == 'POST') {
                $rules[$locale . '.slug'] = 'required|unique:' . (new SitemapTranslation())->getTable() . ',slug';
            } else {
                $rules[$locale . '.slug'] = 'required|unique:' . (new SitemapTranslation())->getTable() . ',slug,' . $id . ',sitemap_id';
            }
        }

        return $rules;
    }

    public function attributes()
    {
        $attributes = [
            'is_active' => __('og.sitemaps.is_active'),
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            $attributes[$locale . '.slug'] = __('og.sitemap_translations.slug') . " ($locale)";
            $attributes[$locale . '.name'] = __('og.sitemap_translations.name') . " ($locale)";
            $attributes[$locale . '.description'] = __('og.sitemap_translations.description') . " ($locale)";
        }

        return $attributes;
    }

    public function prepared()
    {
        return $this->request->all();
    }
}

