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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_type_id' => 'required|exists:user_types,id',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'address' => 'required',
            'username' => 'required|string|unique:user_credentials',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
