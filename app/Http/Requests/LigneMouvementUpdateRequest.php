<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LigneMouvementUpdateRequest extends FormRequest
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

            'id' => 'required|exists:ligne_mouvements,id',
            'mouvement' => 'required|exists:mouvements,id',
            'numSerie' => 'required|exists:instances,numero_serie',
            'quantite' => 'required',
        ];
    }

    
    public function messages()
    {
        return [
            'mouvement.exists' => 'Le mouvement n\'existe pas !',
            'mouvement.required' => 'Champ obligatoire',
            'numSerie.required' => 'Champ obligatoire',
            'numSerie.exists' => 'L\'article n\'existe pas !',
            'quantite.required' => 'Champ obligatoire',
            'id.exists' => 'Une erreur est survenue !',
        ];
    }
}
