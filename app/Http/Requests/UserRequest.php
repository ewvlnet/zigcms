<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->segment(3);

        $rules = [
            'name' => "required|min:3|max:255|unique:users,name,{$id},id",
            'email' => "required|email|min:3|max:255|unique:users,email,{$id},id",
            'password' => 'required|min:8|max:16',
        ];

        if ($this->method() == 'PUT') {
            $rules['password'] = 'nullable|min:8|max:16';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'The name is required',
            'name.min' => 'The name must be at least 3 characters',
            'name.max' => 'The name must not be greater than 255 characters',
            'name.unique' => 'The name provided is already in use by another user',

            'email.required' => 'Enter email',
            'email.email' => 'The email provided is not valid, please enter your email correctly',
            'email.min' => 'The email provided is too short',
            'email.max' => 'The email provided is too long',
            'email.unique' => 'The email provided is already in use by another user',

            'password.required' => 'Enter the password',
            'password.min' => 'The password must be at least 8 characters long',
            'password.max' => 'The password must be a maximum of 16 characters',
            'password.confirmed' => 'Password and password confirmation are different',
        ];
    }

}
