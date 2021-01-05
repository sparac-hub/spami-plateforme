<?php

namespace App\Http\Requests;

use App\Models\Cms\UsefulLinkCategory;
use App\Models\Cms\UsefulLinkTranslation;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Cms\UsefulLinkCategoryTranslation;

class UsefulLinkCategoryRequest extends FormRequest
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
        $id = $this->route()->parameter('useful_link_category');

        $rules = [
            'is_active' => 'required',
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            $rules[$locale . '.title'] = 'required';
            if (request()->method() == 'POST') {
                $rules[$locale . '.slug'] = 'required|unique:' . (new UsefulLinkCategoryTranslation())->getTable() . ',slug';
            } else {
                $rules[$locale . '.slug'] = 'required|unique:' . (new UsefulLinkCategoryTranslation())->getTable() . ',slug,' . $id . ',useful_link_category_id';
            }
        }

        return $rules;
    }

    public function attributes()
    {
        $attributes = [
            'is_active' => __('og.useful_link_categories.is_active'),
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            $attributes[$locale . '.slug'] = __('og.useful_link_category_translations.slug') . " ($locale)";
            $attributes[$locale . '.title'] = __('og.useful_link_category_translations.name') . " ($locale)";
        }

        return $attributes;
    }

    public function prepared()
    {
        return $this->request->all();
    }
}

