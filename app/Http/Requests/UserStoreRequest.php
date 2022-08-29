<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3'
        ];
    }

    
    public function messages()
    {
        return [
            'email.unique' => 'Le mail doit être unique, une adresse identique a été détectée !',
            'password.min' => 'Le mot de passe doit avoir 8 caractères',
        ];
    }
}
