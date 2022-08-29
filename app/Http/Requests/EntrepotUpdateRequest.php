<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntrepotUpdateRequest extends FormRequest
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
            'id' => 'required|exists:entrepots,id',
            'name' => 'required',
            'localisation' => 'required|exists:entite_admins,id'
        ];
    }

    
    public function messages()
    {
        return [
            'id.exists' => 'Identifiant non trouvé !',
            'name.required' => 'Champ obligatoire',
            'localisation.exists' => 'Entité administrative non retrouvée !',
        ];
    }
}
