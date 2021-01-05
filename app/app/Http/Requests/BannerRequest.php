<?php

namespace App\Http\Requests;

//use App\Models\Cms\Banner;
use App\Models\Cms\EventTranslation;
use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'type' => 'required|in:"image_file","video_file","script","html"', // Todo: use Banner const
            'image_filepath' => 'required_if:type,==,image_file',
            'video_filepath' => 'required_if:type,==,video_file',
            'script' => 'required_if:type,==,script',
            'width' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            //'thumb' => 'nullable',
            'css_class' => 'nullable',
            //'is_for_mobile' => 'required|numeric',
            'is_active' => 'required|numeric',
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            $rules[$locale . '.back_office_title'] = 'required';
            $rules[$locale . '.http_protocol'] = 'required_if:link_type_id,==,3|in:"http://","https://"';
            $rules[$locale . '.link_target'] = 'in:"_self","_blank"';
            $rules[$locale . '.external_link'] = 'required_if:link_type_id,==,3';
            $rules[$locale . '.internal_link'] = 'required_if:link_type_id,==,2';
            $rules[$locale . '.link_type_id'] = 'nullable|in:1,2,3';
        }

        return $rules;
    }

    public function prepared()
    {
        return $this->request->all();
    }
}
