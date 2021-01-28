<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{
    public function index(){
        if (Auth::check()) {
            $usuarios =  User::paginate(2);//se trae todos los usuarios de la BD
            return view('users.index', compact('usuarios')); //se le pasa a la vista todos los usuarios
        } else {
            return redirect()->route('login');
        }
    }

    public function create(){
        if (Auth::check()) {
            return view('users.create');
        } else {
            return redirect()->route('login');
        }
    }

    public function store(UserCreateRequest $request){
        if (Auth::check()) {
            /*$request->validate([ ESTO SE HIZO PARA PROBAR PERO SE HACE EN EL UserCreateRequest
                'name' => 'required|min:8|max:50', //el campo nombre no debe estar en blanco, minimo 8 caracteres y maximo 50
                'email' => 'required|email|unique:users',
                'password' => 'required'
            ]);*/
            User::create($request->only('name', 'email') //tiene que ser igual a name="ejemplo" del input
            + [
                'password' => bcrypt($request->input('password')),
            ]
            );
            return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
        } else {
            return redirect()->route('login');
        }
    }

    public function show($id){
        $user = User::find($id);
        //dd($user);
        return $user;
    }

    public function edit(User $user){
        return view('users.edit', compact('user'));
    }

    public function update(UserEditRequest $request, User $user){
        $data = $request->only('name', 'email'); //traer solo nombre y correo
        $password = $request->input('password');

        if($password) //si se agrego algo en el campo contraseña
            $data['password'] = bcrypt($password); //se agrega en el campo contraseña del array con los datos actualizados

        $user->update($data); //se actualiza el usuario con los nuevos datos en el array

        //se retorna al index de los usuarios con el mensaje de exito
        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
    }

    public function update1(Request $request, $id){
        $user = User::findOrFail($id);
        $data = $request->only('name', 'email'); //traer solo nombre y correo

        if (trim($request->password) == '') { //si la contraseña tiene campo vacio
            $data = $request->except('password'); //se ignora la contraseña
        } else { //si el campo de contraseña no esta vacio
            $data = $request->all(); //se traen todos los datos
            $data['password'] = bcrypt($request->password); //se encripta los datos
        }

        $user->update($data);
        return redirect()->back();
    }

    public function destroy(User $user){
        $user->delete();
        return back()->with('success', 'Usuario eliminado correctamente');
    }
}
