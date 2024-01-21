<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'name' => "required|min:3|max:255|unique:permissions,name,{$id},id",
            'description' => "max:255",
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => __('The name is required'),
            'name.min' => __('The name must be at least 3 characters'),
            'name.max' => __('The name must not be greater than 255 characters'),
            'name.unique' => __('The name has already been taken'),

            'description.max' => __('The description must not be greater than 255 characters'),
        ];
    }
}
