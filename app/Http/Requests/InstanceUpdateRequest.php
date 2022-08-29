<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstanceUpdateRequest extends FormRequest
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
            'id' => 'required|exists:instances,id',
            'numSerie' => 'required|min:10|unique:instances,numero_serie',
            'article' => 'required|exists:articles,id',
            'entrepot' => 'required|exists:entrepots,id',
            'utilisable' => 'required',
        ];
    }

    
    public function messages()
    {
        return [
            'numSerie.min' => 'Le numero de serie doit avoir 10 caratères au minimum',
            'numSerie.unique' => 'Ce numero est déjà utilisé',
            'article.required' => 'Champ obligatoire',
            'entrepot.required' => 'Champ obligatoire',
            'article.exists' => 'L\'article n\'existe pas !',
            'entrepot.exists' =>  'L\'entrepot n\'existe pas !',
            'utilisable.required' => 'Champ obligatoire',
            'id.exists' => 'Une erreur est survenue !',
        ];
    }
}
