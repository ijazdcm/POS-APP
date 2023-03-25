<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_name' => 'required|string|max:255',
            'staff_id' => 'required|unique:users,staff_id',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|string|min:6',
            'email' => 'required|email',

        ];
    }
}