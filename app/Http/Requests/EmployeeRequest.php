<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->route('id'),
            'password' => $this->route('id') ? 'nullable|string|min:8' : 'required|string|min:8',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date_of_birth' => 'nullable|date|before:today',
            'mobile' => 'required|string|max:15|unique:users,mobile,' . $this->route('id')
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Employee name is required',
            'email.required' => 'Employee email is required',
            'email.unique' => 'This email is already in use by another employee',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
            'image.image' => 'The file must be an image',
            'image.mimes' => 'Only jpeg, png, jpg, and gif formats are allowed',
            'image.max' => 'Image size must not exceed 2MB',
            'date_of_birth.date' => 'Date of Birth must be a valid date',
            'date_of_birth.before' => 'Date of Birth must be a date before today',
            'mobile.required' => 'Mobile number is required',
            'mobile.unique' => 'This mobile number is already in use by another employee',
            'mobile.max' => 'Mobile number must not exceed 15 characters',
        ];
    }

}
