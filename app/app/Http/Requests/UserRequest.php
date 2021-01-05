<?php

namespace App\Http\Requests;

use App\Models\Cms\EventTranslation;
use App\Models\Cms\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $id = $this->route()->parameter('user');

        $rules = [
            'name' => 'required|between:4,16',
            'role_id' => 'required',
        ];

        if (request()->method() == 'POST') {
            $rules['password'] = 'required';
            $rules['email'] = 'required|email|unique:' . (new User)->getTable();

        } else {
            $rules['email'] = 'required|email|unique:' . (new User)->getTable() . ',email,' . $id . ',id';
        }

        return $rules;
    }

    public function prepared()
    {
        return $this->request->all();
    }
}
