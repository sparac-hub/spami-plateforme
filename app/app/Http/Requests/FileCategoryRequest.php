<?php

namespace App\Http\Requests;

use App\Models\Cms\FileCategoryTranslation;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Cms\EventCategoryTranslation;

class FileCategoryRequest extends FormRequest
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
        $id = $this->route()->parameter('file_category');

        $rules = [
            'is_active' => 'required',
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            $rules[$locale . '.name'] = 'required';
            if (request()->method() == 'POST') {
                $rules[$locale . '.slug'] = 'required|unique:' . (new FileCategoryTranslation())->getTable() . ',slug';
            } else {
                $rules[$locale . '.slug'] = 'required|unique:' . (new FileCategoryTranslation())->getTable() . ',slug,' . $id . ',file_category_id';
            }
        }

        return $rules;
    }

    public function attributes()
    {
        $attributes = [
            'is_active' => __('og.events.is_active'),
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            $attributes[$locale . '.slug'] = __('og.file_category_translations.slug') . " ($locale)";
            $attributes[$locale . '.name'] = __('og.file_category_translations.name') . " ($locale)";
        }

        return $attributes;
    }

    public function prepared()
    {
        return $this->request->all();
    }
}
