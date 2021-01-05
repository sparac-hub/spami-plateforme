<?php

namespace App\Http\Requests;

use App\Models\Cms\PartnerCategoryTranslation;
use Illuminate\Foundation\Http\FormRequest;

class PartnerCategoryRequest extends FormRequest
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
        $id = $this->route()->parameter('partner_category');

        $rules = [
            'is_active' => 'required',
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            $rules[$locale . '.title'] = 'required';
            if (request()->method() == 'POST') {
                $rules[$locale . '.slug'] = 'required|unique:' . (new PartnerCategoryTranslation())->getTable() . ',slug';
            } else {
                $rules[$locale . '.slug'] = 'required|unique:' . (new PartnerCategoryTranslation())->getTable() . ',slug,' . $id . ',partner_category_id';
            }
        }

        return $rules;
    }

    public function attributes()
    {
        $attributes = [
            'is_active' => __('og.partner_categories.is_active'),
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            $attributes[$locale . '.slug'] = __('og.partner_category_translations.slug') . " ($locale)";
            $attributes[$locale . '.name'] = __('og.partner_category_translations.name') . " ($locale)";
            $attributes[$locale . '.description'] = __('og.partner_category_translations.description') . " ($locale)";
        }

        return $attributes;
    }

    public function prepared()
    {
        return $this->request->all();
    }
}

