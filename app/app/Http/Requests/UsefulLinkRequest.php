<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsefulLinkRequest extends FormRequest
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
        $rules = [
            'is_active' => 'required',
            'url' => 'required',
            'protocol' => 'required',
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            $rules[$locale . '.title'] = 'required';
        }

        return $rules;
    }

    public function attributes()
    {
        $attributes = [
            'is_active' => __('og.useful_links.is_active'),
            'url' => __('og.useful_links.url'),
            'protocol' => __('og.useful_links.protocol'),
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            $attributes[$locale . '.title'] = __('og.useful_link_categories.title') . " ($locale)";
        }

        return $attributes;
    }

    public function prepared()
    {
        return $this->request->all();
    }
}
