<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UtilisateurStoreRequest extends FormRequest
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
        if (request()->isMethod('post')) {
            return [
                'nom' => 'required|string|max:20',
                'prenom' => 'required|string|max:20'
            ];
        } else {
            return [
                'nom' => 'required|string|max:20',
                'prenom' => 'required|string|max:20'
            ];
        }
    }
    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        if (request()->isMethod('post')) {
            return [
                'nom.required' => 'Nom is required!',
                'prenom.required' => 'Prenom is required!'
            ];
        } else {
            return [
                'nom.required' => 'Nom is required!',
                'prenom.required' => 'Prenom is required!'
            ];
        }
    }
}
