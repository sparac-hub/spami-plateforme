<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Cms\FaqCategoryTranslation;

class FaqCategoryRequest extends FormRequest
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
        $id = $this->route()->parameter('faq_category');

        $rules = [
            'is_active' => 'required',
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            $rules[$locale . '.name'] = 'required';
            if (request()->method() == 'POST') {
                $rules[$locale . '.slug'] = 'required|unique:' . (new FaqCategoryTranslation())->getTable() . ',slug';
            } else {
                $rules[$locale . '.slug'] = 'required|unique:' . (new FaqCategoryTranslation())->getTable() . ',slug,' . $id . ',faq_category_id';
            }
        }

        return $rules;
    }

    public function attributes()
    {
        $attributes = [
            'is_active' => __('og.event_category_translations.is_active'),
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            $attributes[$locale . '.slug'] = __('og.event_category_translations.slug') . " ($locale)";
            $attributes[$locale . '.name'] = __('og.event_category_translations.name') . " ($locale)";
        }

        return $attributes;
    }

    public function prepared()
    {
        return $this->request->all();
    }
}
