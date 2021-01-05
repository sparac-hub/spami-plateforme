<?php

namespace App\Http\Requests;

use App\Rules\CurrentPassword;
use Illuminate\Validation\Rule;

class UpdateUserProfile extends Request
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
        // This will validates two forms : General updates and password update

        if (request('password')) {
            return $this->passwordFormRules();
        }

        return $this->generalFormRules();
    }

    public function passwordFormRules()
    {
        return [
            'old_password' => [
                'required',
                new CurrentPassword(auth()->user()),
            ],
            'password' => [
                'required',
                'confirmed',
            ],
        ];
    }

    public function generalFormRules()
    {
        return [
            'name' => 'required|between:3,16',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(auth()->user()->id),
            ],
        ];
    }
}
