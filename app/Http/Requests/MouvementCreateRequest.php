<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MouvementCreateRequest extends FormRequest
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

            'typeMouvement' => 'required|exists:type_mouvements,id',
            'expediteur' => 'required|exists:entrepots,id',
            'beneficiaire' => 'required|exists:entrepots,id',
        ];
    }

    
    public function messages()
    {
        return [
            'typeMouvement.required' => 'Champ obligatoire',
            'expediteur.required' => 'Champ obligatoire',
            'beneficiaire.required' => 'Champ obligatoire',
            'beneficiaire.exists' => 'L\'entrepot n\'existe pas !',
            'typeMouvement.exists' => 'Le type de mouvement n\'existe pas !',
            'entrepot.exists' =>  'L\'entrepot n\'existe pas !',
        ];
    }
}
