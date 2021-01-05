<?php

namespace App\Http\Requests;

use App\Rules\CurrentPassword;

class UpdateUserPassword extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        $rules = [
            'current_password' => ['required', new CurrentPassword(auth()->user())],
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ];

        return $rules;
    }

    public function attributes()
    {
        $attributes = [
            'current_password' => 'wrong_password',
            'password' => __('haicop_register.division'),
            'password_confirmation' => __('haicop_register.site_web'),
        ];

        return $attributes;
    }
}
