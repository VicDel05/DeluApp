<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Roles;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller{
    // Función para mostrar el formulario de registro
    public function showRegistrationForm()
    {
        $roles = Roles::all();

        return view('auth.register', compact('roles')); // Vista de registro
    }

    // Función para procesar el registro de un usuario
    public function register(Request $request){

        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellidoP' => ['required', 'string', 'max:255'],
            'apellidoM' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_id' => ['required', 'exists:roles,id'], // Verifica si el rol existe
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
        //$this->validator($request->all())->validate();

        $user = User::create([
            'nombre' => $request->nombre,
            'apellidoP' => $request->apellidoP,
            'apellidoM' => $request->apellidoM,
            'email' => $request->email,
            'role_id' => $request->role_id, // Asignación del rol
            'password' => bcrypt($request->password), // Encriptar contraseña
        ]);

        // Registrar el usuario
        //$user = $this->create($request->all());
        
        // Autenticar automáticamente al usuario registrado
        Auth::login($user);
        //uth()->login($user);

        // Redirigir al dashboard después del registro
        return redirect('/dashboard');
    }

    // Validación de datos de entrada
    // protected function validator(array $data){
    //     return Validator::make($data, [
    //         'nombre' => ['required', 'string', 'max:255'],
    //         'apellidoP' => ['required', 'string', 'max:255'],
    //         'apellidoM' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'role_id' => ['required', 'exists:roles,id'], // Verifica si el rol existe
    //         'password' => ['required', 'string', 'min:8', 'confirmed']
    //     ]);
    // }

    // Creación del usuario
    // protected function create(array $data){
    //     return User::create([
    //         'nombre' => $data['nombre'],
    //         'apellidoP' => $data['apellidoP'],
    //         'apellidoM' => $data['apellidoM'],
    //         'email' => $data['email'],
    //         'role_id' => $data['role_id'], // Asignación del rol
    //         'password' => Hash::make($data['password']) // Encriptación de contraseña
    //     ]);
    // }
}
