<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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
        $rules = [
            'is_active' => 'required',
            'facebook' => 'sometimes|nullable|url',
            'instagram' => 'sometimes|nullable|url',
            'twitter' => 'sometimes|nullable|url',
            'linkedin' => 'sometimes|nullable|url',
            //'testimonial_category_id' => 'required'
        ];

        if (request()->method() == 'POST') {
            $rules['image'] = 'required';
        }

        foreach (config('translatable.locales') as $k => $locale) {
            $rules[$locale . '.title'] = 'required';
        }

        return $rules;
    }

    public function attributes()
    {
        $attributes = [
            'is_active' => __('og.testimonials.is_active'),
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            $attributes[$locale . '.title'] = __('og.testimonial_translations.title') . " ($locale)";
        }

        return $attributes;
    }

    public function prepared()
    {
        return $this->request->all();
    }
}
