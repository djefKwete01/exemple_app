<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntiteAdminRequest extends FormRequest
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
            'id' => 'required|exists:entite_admins,id',
            'name' => 'required',
            'type_entite_admin' => 'required|exists:type_entite_admins,id',
            
        ];
    }

    
    public function messages()
    {
        return [
            'id.exists' => 'Identifiant non retrouvé !',
            'name.required' => 'Champ obligatoire',
            'type_entite_admin.exists' => 'Type d\'entité administratif non retrouvé !',
            
        ];
    }
}
