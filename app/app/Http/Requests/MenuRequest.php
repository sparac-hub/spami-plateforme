<?php

namespace App\Http\Requests;

use App\Models\Cms\EventTranslation;
use App\Models\Cms\MenuTranslation;
use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
        $id = $this->route()->parameter('menu');

        $rules = [
            'menu_group_id' => 'required',
            'link_type_id' => 'required',
            'is_active' => 'required',
        ];

        $request = request()->all();
        switch ($request['link_type_id']) {
            case 1:
                $rules['module_id'] = 'required';
                break;
            case 2:
                $rules['internal_link'] = 'required';
                $rules['link_target'] = 'required';
                break;
            case 3:
                $rules['http_protocol'] = 'required';
                $rules['external_link'] = 'required';
                $rules['link_target'] = 'required';
                break;
        }

        foreach (config('translatable.locales') as $k => $locale) {
            $rules[$locale . '.label'] = 'required';
            if (request()->method() == 'POST') {
                $rules[$locale . '.slug'] = 'required|unique:' . (new MenuTranslation)->getTable() . ',slug,null,id,deleted_at,NULL';
            } else {
                $rules[$locale . '.slug'] = 'required|unique:' . (new MenuTranslation)->getTable() .
                    ',slug,' . $id . ',menu_id,deleted_at,NULL';
            }

        }

        return $rules;
    }

    public function attributes()
    {
        $attributes = [
            'menu_group_id' => __('og.menus.menu_group_id'),
            'link_type_id' => __('og.menus.link_type_id'),
            'is_active' => __('og.menus.is_active'),
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            $attributes[$locale . '.slug'] = __('og.menu_translations.slug') . " ($locale)";
            $attributes[$locale . '.label'] = __('og.menu_translations.label') . " ($locale)";
        }

        return $attributes;
    }

    public function prepared()
    {
        return $this->request->all();
    }
}
