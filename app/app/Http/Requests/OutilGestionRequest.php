<?php

namespace App\Http\Requests;

use App\Models\Cms\OutilGestion;
use App\Models\Cms\OutilGestionTranslation;
use Illuminate\Foundation\Http\FormRequest;

class OutilGestionRequest extends FormRequest
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
        $id = $this->route()->parameter('outil_gestion');

        $rules = [];

        foreach (config('translatable.locales') as $k => $locale) {
            $rules[$locale . '.name'] = 'required';
            $rules[$locale . '.url_video'] = 'nullable|required_if:' . $locale . '.type,==,' . OutilGestion::VIDEO . '|url';
            $rules[$locale . '.url_lien'] = 'nullable|required_if:' . $locale . '.type,==,' . OutilGestion::LIEN . '|url';

            if (request()->method() == 'POST') {
                $rules[$locale . '.slug'] = 'required|unique:' . (new OutilGestionTranslation)->getTable() . ',slug';
                $rules[$locale . '.file_guideline'] = 'nullable|required_if:' . $locale . '.type,==,' . OutilGestion::GUIDELINE . '|file|mimes:pdf';
                $rules[$locale . '.file_manuel'] = 'nullable|required_if:' . $locale . '.type,==,' . OutilGestion::MANUEL . '|file|mimes:pdf';
            } else {
                $rules[$locale . '.slug'] = 'required|unique:' . (new OutilGestionTranslation)->getTable() . ',slug,' . $id . ',outil_gestion_id';
            }
        }
        return $rules;
    }

    public function attributes()
    {
        $attributes = [
            'url_video' => __('og.outil_gestions.url_video'),
            'url_lien' => __('og.outil_gestions.url_lien'),
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            $attributes[$locale . '.slug'] = __('og.outil_gestion_translations.slug') . " ($locale)";
            $attributes[$locale . '.name'] = __('og.outil_gestion_translations.name') . " ($locale)";
            $attributes[$locale . '.file_guideline'] = __('og.outil_gestion_translations.document') . " ($locale)";
            $attributes[$locale . '.file_manuel'] = __('og.outil_gestion_translations.document') . " ($locale)";
        }

        return $attributes;
    }

    public function prepared()
    {
        return $this->request->all();
    }
}
