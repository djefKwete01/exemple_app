<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:8',
            'id' => 'required|exists:users,id'
        ];
    }

    
    public function messages()
    {
        return [
            'email.unique' => 'Le mail doit être unique, une adresse identique a été détectée !',
            'password.min' => 'Le mot de passe doit avoir 8 caractères',
            'id.exists' => 'Cet utilisateur n\'a pas été retrouvé !',
        ];
    }
}
