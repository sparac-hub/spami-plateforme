<?php

namespace App\Http\Requests;

use App\Models\Cms\EventTranslation;
use Illuminate\Foundation\Http\FormRequest;

class ContactMessageRequest extends FormRequest
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
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'message' => 'required',
            'email' => ['required', 'email'],
            'g-recaptcha-response' => 'required|recaptcha',
        ];

        if ($this->is_company) {
            $rules = [
                'name' => 'required',
                //'g-recaptcha-response' => 'required|recaptcha',
                //'nationality_str' => 'required',
                'type' => 'required',
                //'other_type' => 'required_if:type,other',
                'subject' => 'required',
                'message' => 'required',
                //'phone' => 'required',
                //'governorate_id',
                'email' => 'required',
            ];
        } else {
            $rules = [
                //'first_name' => 'required',
                //'last_name' => 'required',
                //'g-recaptcha-response' => 'required|recaptcha',
                //'nationality_str' => 'required',
                'type' => 'required',
                //'other_type' => 'required_if:type,other',
                'subject' => 'required',
                'message' => 'required',
                //'phone' => 'required',
                //'governorate_id',
                'email' => 'required',
            ];
        }

        return $rules;
    }

    public function attributes()
    {
        $attributes = [
            'email' => __('og.contact_messages.email'),
            'subject' => __('og.contact_messages.subject'),
            'message' => __('og.contact_messages.message'),
            'name' => __('og.contact_messages.name'),
            'is_company' => __('og.contact_messages.is_company'),
            'fiscal_code' => __('og.contact_messages.fiscal_code'),
            'domain' => __('og.contact_messages.domain'),
            'first_name' => __('og.contact_messages.first_name'),
            'last_name' => __('og.contact_messages.last_name'),
            'phone' => __('og.contact_messages.phone'),
            'fax' => __('og.contact_messages.fax'),
            'address' => __('og.contact_messages.address'),
            'postal_code' => __('og.contact_messages.postal_code'),
            'nationality_str' => __('og.contact_messages.nationality_str'),
            'governorate_str' => __('og.contact_messages.governorate_str'),
            'governorate_id' => __('og.contact_messages.governorate_id'),
            'type' => __('og.contact_messages.type'),
            'other_type' => __('og.contact_messages.other_type'),
            'read_at' => __('og.contact_messages.read_at'),
        ];

        return $attributes;
    }

    public function prepared()
    {
        return $this->request->all();
    }
}
