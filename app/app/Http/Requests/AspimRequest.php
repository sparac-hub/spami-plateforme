<?php

namespace App\Http\Requests;

use App\Models\Cms\AspimTranslation;
use Illuminate\Foundation\Http\FormRequest;

class AspimRequest extends FormRequest
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
        $id = $this->route()->parameter('aspim');

        $rules = [
            'website',
            'website_name' => 'required',
            'included_at', // Année inclusion
            'total_surface', // Total surface
            'total_surface_marine', // Superficie marine
            'width', // Longeur de la cote principale
            'aspim_category_id' => 'required', // Category
            'creation_date', // Date de création

            'geojson',
            'is_mpa',
            'mapamed_feature_id' => 'required',
            'business_plan',

            'is_active',
            'menu_id',
        ];

        if (request()->method() == 'POST') {
            $rules['image'] = 'required';
            $rules['document'] = 'required';
        }

        foreach (config('translatable.locales') as $k => $locale) {
            $rules[$locale . '.name'] = 'required';
            $rules[$locale . '.status'] = 'required';
            $rules[$locale . '.creation_text'] = 'required';
            $rules[$locale . '.physical_features'] = 'required';
            $rules[$locale . '.ecological_features'] = 'required';
            $rules[$locale . '.threats_and_pressures'] = 'required';
            $rules[$locale . '.teritory'] = 'required';
            $rules[$locale . '.mediterranean_importance'] = 'required';
            $rules[$locale . '.management_body'] = 'required';
            $rules[$locale . '.geographic_position'] = 'required';
            if (request()->method() == 'POST') {
                $rules[$locale . '.slug'] = 'required|unique:' . (new AspimTranslation)->getTable() . ',slug';
            } else {
                $rules[$locale . '.slug'] = 'required|unique:' . (new AspimTranslation)->getTable() . ',slug,' . $id . ',aspim_id';
            }
        }

        return $rules;
    }

    public function attributes()
    {
        $attributes = [
            'image' => __('og.aspims.image'),
            'start_date' => __('og.aspims.start_date'),
            'end_date' => __('og.aspims.end_date'),
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            $attributes[$locale . '.slug'] = __('og.aspim_translations.slug') . " ($locale)";
            $attributes[$locale . '.name'] = __('og.aspim_translations.name') . " ($locale)";
            $attributes[$locale . '.description'] = __('og.aspim_translations.description') . " ($locale)";
        }

        return $attributes;
    }

    public function prepared()
    {
        return $this->request->all();
    }
}
