<?php

namespace App\Http\Requests;

use App\Models\Cms\EventTranslation;
use App\Models\Cms\Widget;
use Illuminate\Foundation\Http\FormRequest;

class WidgetRequest extends FormRequest
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
        $id = $this->route()->parameter('widget');

        $rules = [
            //'reference' => 'required|min:2|unique:widgets',
            'module_id' => 'required|numeric',
            'placement' => 'required',
            'order_column' => 'required',
            'order_column_type' => 'required',
            'type' => 'required',
            'select_type' => 'required',
            'number_for_latest' => 'numeric|nullable',
            // 'order' => 'nullable|numeric',
            'is_active' => 'required|boolean'
        ];

        if (request()->method() == 'POST') {
            $rules['reference'] = 'required|min:2|unique:' . (new Widget())->getTable() . ',reference';
        } else {
            // $rules['reference'] = 'required|min:2|unique:' . (new Widget())->getTable() . ',reference,' . $id . ',id';
        }

        foreach (config('translatable.locales') as $k => $locale) {
            $rules[$locale . '.name'] = 'required|min:3';
            // $rules[$locale . '.description'] = 'nullable|min:3';
        }

        return $rules;
    }

    public function attributes()
    {
        $attributes = [
            'module_id' => __('og.widgets.module_id'),
            'reference' => __('og.widgets.reference'),
            'placement' => __('og.widgets.placement'),
            'order_column' => __('og.widgets.order_column'),
            'order_column_type' => __('og.widgets.order_column_type'),
            'type' => __('og.widgets.type'),
            'select_type' => __('og.widgets.select_type'),
            'number_for_latest' => __('og.widgets.number_for_latest'),
            'is_active' => __('og.widgets.is_active'),
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            $attributes[$locale . '.name'] = __('og.widgets_translations.name') . " ($locale)";
        }

        return $attributes;
    }

    public function prepared()
    {
        return $this->request->all();
    }
}
