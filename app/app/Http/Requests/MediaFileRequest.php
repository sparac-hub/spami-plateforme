<?php

namespace App\Http\Requests;

use App\Models\Cms\MediaFile;
use App\Models\Cms\MediaFileTranslation;
use Illuminate\Foundation\Http\FormRequest;

class MediaFileRequest extends FormRequest
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
        $id = $this->route()->parameter('media_file');

        $rules = [
            'media_album_id' => 'required',
            'type' => 'required',
            'image_filepath' => 'required_if:type,==,' . MediaFile::IMAGE,
            'video_filepath' => 'required_if:type,==,' . MediaFile::VIDEO,
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            $rules[$locale . '.name'] = 'required';
            if (request()->method() == 'POST') {
                $rules[$locale . '.slug'] = 'required|unique:' . (new MediaFileTranslation)->getTable() . ',slug';
            } else {
                $rules[$locale . '.slug'] = 'required|unique:' . (new MediaFileTranslation)->getTable() . ',slug,' . $id . ',media_file_id';
            }
        }

        return $rules;
    }

    public function attributes()
    {
        $attributes = [
            'image' => __('og.media_files.image'),
            'start_date' => __('og.media_files.start_date'),
            'end_date' => __('og.media_files.end_date'),
            'media_file_category_id' => __('og.media_files.media_file_category_id'),
        ];

        foreach (config('translatable.locales') as $k => $locale) {
            $attributes[$locale . '.slug'] = __('og.media_file_translations.slug') . " ($locale)";
            $attributes[$locale . '.name'] = __('og.media_file_translations.name') . " ($locale)";
            $attributes[$locale . '.description'] = __('og.media_file_translations.description') . " ($locale)";
        }

        return $attributes;
    }

    public function prepared()
    {
        return $this->request->all();
    }
}
