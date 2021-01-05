<?php

namespace App\Http\Requests;

use App\Models\Cms\NewsTranslation;
use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function rules()
    {
        $id = $this->route()->parameter('news');

        $rules = [
            'is_active' => 'required',
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            if (request()->method() == 'POST') {
                $rules[$locale . '.slug'] = 'required|unique:' . (new NewsTranslation)->getTable() . ',slug';
            } else {
                $rules[$locale . '.slug'] = 'required|unique:' . (new NewsTranslation)->getTable() . ',slug,' . $id . ',news_id';
            }
            $rules[$locale . '.name'] = 'required';
            $rules[$locale . '.pays'] = 'required';
        }

        return $rules;
    }


    public function attributes()
    {
        $attributes = [
            'is_active' => __('og.news.is_active'),
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            $attributes[$locale . '.slug'] = __('og.news_translations.slug') . " ($locale)";
            $attributes[$locale . '.name'] = __('og.news_translations.name') . " ($locale)";
            $attributes[$locale . '.pays'] = __('og.news_translations.pays') . " ($locale)";
            //$attributes[$locale . '.content'] = __('og.news_translations.content') . " ($locale)";
        }

        return $attributes;
    }
}
