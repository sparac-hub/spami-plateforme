<?php

namespace App\Http\Requests;

use App\Models\Cms\EventTranslation;
use Illuminate\Foundation\Http\FormRequest;

class ProcedureRequest extends FormRequest
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

        if (request()->method() == 'POST') {
            $rules['file'] = 'required';
            $rules['rapport'] = 'required';
            $rules['aspim'] = 'required';
        }

        foreach (config('translatable.locales') as $k => $locale) {
            $rules[$locale . '.name'] = 'required';
        }

        return $rules;
    }

    public function attributes()
    {
        $attributes = [
            'file' => __('og.procedures.file'),
            'rapport' => __('og.procedures.rapport'),
            'aspim' => __('og.procedures.aspim'),
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            $attributes[$locale . '.name'] = __('og.procedure_translations.name') . " ($locale)";
        }

        return $attributes;
    }

    public function prepared()
    {
        return $this->request->all();
    }
}
