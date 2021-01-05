<?php

namespace App\Http\Requests;

use App\Models\Cms\EventTranslation;
use Illuminate\Foundation\Http\FormRequest;

class FaqItemRequest extends FormRequest
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
        $rules = [];

        foreach (config('translatable.locales') as $k => $locale) {
            $rules[$locale . '.question'] = 'required|min:10';
            $rules[$locale . '.answer'] = 'required|min:10';
        }

        return $rules;
    }

    public function attributes()
    {
        $attributes = [];

        foreach (config('translatable.locales') as $k => $locale) {
            $attributes[$locale . '.question'] = __('og.faq_item_translations.question') . " ($locale)";
            $attributes[$locale . '.answer'] = __('og.faq_item_translations.answer') . " ($locale)";
        }

        return $attributes;
    }

    public function prepared()
    {
        return $this->request->all();
    }
}
