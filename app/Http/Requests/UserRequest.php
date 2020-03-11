<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        return [
            'name' => 'required|min:3|max:25',
            'email' => 'required|email|unique:users,email,'. $this->request->get('user_id') .',id',
            'old_password' => 'exclude_if:password,|password',
            'password' => 'exclude_if:password,|min:3|same:password_confirmation'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'is_admin' => 'Is Admin',
            'password' => 'Password',
            'password_confirmation' => 'Password Confirmation'
        ];
    }
}
