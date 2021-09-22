<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|min:2|max:255',
            'last_name' => 'required|min:2|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required',
            'first_name.min' => 'First name minimum 2 symbols',
            'first_name.max' => 'First name maximum 255 symbols',
            'last_name.required' => 'Last name is required',
            'last_name.min' => 'Last name minimum 2 symbols',
            'last_name.max' => 'Last name maximum 255 symbols',
        ];
    }
}
