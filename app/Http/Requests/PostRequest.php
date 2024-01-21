<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => "required|min:3|max:255|unique:posts,title,{$id},id",
            'excerpt' => "max:255",

            //"body" => "required|min:3"
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => __('The title is required'),
            'title.min' => __('The title must be at least 3 characters'),
            'title.max' => __('The title must not be greater than 255 characters'),
            'title.unique' => __('The title has already been taken'),

            'excerpt.max' => __('The excerpt must not be greater than 255 characters'),

            //'body.required' => __('The field is required'),
            //'body.min' => __('The field must be at least 3 characters'),
        ];
    }
}
