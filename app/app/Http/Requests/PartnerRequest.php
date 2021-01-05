<?php

namespace App\Http\Requests;

use App\Models\Cms\EventTranslation;
use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
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

        if (request()->method() == 'POST') {
            $rules['image'] = 'required';
        }

        foreach (config('translatable.locales') as $k => $locale) {
            $rules[$locale . '.title'] = 'required';
        }

        return $rules;
    }

    public function attributes()
    {
        $attributes = [
            'is_active' => __('og.partners.is_active'),
            'url' => __('og.partners.url'),
            'protocol' => __('og.partners.protocol'),
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            $attributes[$locale . '.title'] = __('og.partner_translations.title') . " ($locale)";
        }

        return $attributes;
    }

    public function prepared()
    {
        return $this->request->all();
    }
}
