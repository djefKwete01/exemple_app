<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntiteAdminCreateRequest extends FormRequest
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
            'name' => 'required|unique:entite_admins,nom',
            'type_entite_admin' => 'required|exists:type_entite_admins,id'
        ];
    }

    
    public function messages()
    {
        return [
            'name.required' => 'Champ obligatoire',
            'name.unique' => 'Ce nom existe déjà !',
            'type_entite_admin.exists' => 'Type d\'entité administratif non retrouvé !',
        ];
    }
}
