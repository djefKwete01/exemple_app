<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntrepotCreateRequest extends FormRequest
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
            'name' => 'required|unique:entrepots,nom',
            'localisation' => 'required|exists:entite_admins,id'
        ];
    }

    
    public function messages()
    {
        return [
            'name.required' => 'Champ obligatoire',
            'name.unique' => 'Ce nom existe déjà !',
            'localisation.exists' => 'Entité administrative non retrouvée !',
        ];
    }
}
