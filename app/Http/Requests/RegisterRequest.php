<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            'username' => 'required|min:4',
            'fullName' => 'required|regex:/^[a-zA-Z\s]+$/|min:4',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Please enter your username',
            'username.min' => 'Your username must be at least :min characters long',
            'fullName.required' => 'Please enter your full name',
            'email.required' => 'Please enter your email address',
            'email.email' => 'Please enter a valid email address',
            'password.required' => 'Please enter a password',
            'password.min' => 'Your password must be at least :min characters long',
            'profile_picture.required' => 'Please select a profile picture',
            'profile_picture.image' => 'Please select a valid image file',
            'profile_picture.mimes' => 'Please select an image of type: jpg, jpeg, png'
        ];
    }
}
