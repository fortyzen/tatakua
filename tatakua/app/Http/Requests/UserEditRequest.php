<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
        $user = $this->route('user');
        return [
            'name' => 'required',
            'email' => ['required', 'unique:users,email,'. request()->route('user')->id], //se hace asi para que no cree problemas al dar guardar
            'password' => 'sometimes'
            /*esto es para ver en el caso de que se edite un usuario pero al dar guardar no busque
            el supuesto username (que no existe en la BD es solo ejemplo) ya que al dar guardar crea problemas
            porque intenta guardar y encuentra que ya existe en la base de datos
            'username' => ['required', 'unique:users,username,' . $user->id],*/
        ];
    }
}
