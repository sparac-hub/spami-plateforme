<?php

namespace App\Http\Requests;

use App\Models\Cms\GestionnaireAspim;
use App\Models\Cms\GestionnaireAspimTranslation;
use Illuminate\Foundation\Http\FormRequest;

class GestionnaireAspimRequest extends FormRequest
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
        $id = $this->route()->parameter('gestionnaire_aspim');

        $rules = [
            'surname' => 'required',
            'tel' => 'required',
            //'aspim' => 'required',
        ];

        if (request()->method() == 'POST') {
            $rules['email'] = 'required|email|unique:' . (new GestionnaireAspim)->getTable();
            $rules['password'] = 'required|confirmed';
        } else {
            $rules['email'] = 'required|email|unique:' . (new GestionnaireAspim)->getTable() . ',email,' . $id . ',id';
            if (request()->password) {
                $rules['password'] = 'nullable|confirmed';
            }
        }

        foreach (config('translatable.locales') as $k => $locale) {
            $rules[$locale . '.nom_abrege_institution'] = 'required';
            $rules[$locale . '.nom_institution'] = 'required';
            if (request()->method() == 'POST') {
                $rules[$locale . '.slug'] = 'required|unique:' . (new GestionnaireAspimTranslation)->getTable() . ',slug';
            } else {
                $rules[$locale . '.slug'] = 'required|unique:' . (new GestionnaireAspimTranslation)->getTable() . ',slug,' . $id . ',gestionnaire_aspim_id';
            }
        }

        return $rules;
    }

    public function attributes()
    {
        $attributes = [
            'surname' => __('og.gestionnaire_aspim.surname'),
            'email' => __('og.gestionnaire_aspim.email'),
            'password' => __('og.gestionnaire_aspim.password'),
            'tel' => __('og.gestionnaire_aspim.tel'),
            //'aspim' => __('og.gestionnaire_aspim.aspim'),
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            $attributes[$locale . '.slug'] = __('og.gestionnaire_aspim.slug') . " ($locale)";
            $attributes[$locale . '.nom_abrege_institution'] = __('og.gestionnaire_aspim_translation.nom_abrege_institution') . " ($locale)";
            $attributes[$locale . '.nom_institution'] = __('og.gestionnaire_aspim_translation.nom_institution') . " ($locale)";
        }

        return $attributes;
    }

    public function prepared()
    {
        return $this->request->all();
    }
}
