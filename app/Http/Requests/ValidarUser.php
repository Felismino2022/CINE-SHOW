<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarUser extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|regex:/^[a-zá-ùÁ-Ù][a-z0-9á-ùÁ-Ù\s]+$/i',
            'numero' => 'required|regex:/^[9][0-9]+$/|min:9'
        ];
    }
}
