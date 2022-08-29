<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AllArticlesRequest extends FormRequest
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

    public function rules()
    {
        return [
            'id' => 'required|exists:categories,id'
        ];
    }

    
    public function messages()
    {
        return [
            'id.exists' => 'Categorie non retrouvé !',
        ];
    }
}
