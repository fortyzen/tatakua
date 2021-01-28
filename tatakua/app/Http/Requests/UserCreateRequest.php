<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //debe estar en true si o si para que funcione
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:8|max:50', //el campo nombre no debe estar en blanco, minimo 8 caracteres y maximo 50
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ];
    }

    public function messages(){ //para personalizar los mensajes
        return[
            'nam.required' => 'Ingresa tu nombre '
        ];
    }
}
