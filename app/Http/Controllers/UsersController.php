<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller{
    // Listar todos los usuarios
    public function index()
    {
        $users = User::with('role')->get(); // Traer también el rol del usuario
        return view('users.index', compact('users'));
    }

    // Mostrar formulario de creación de usuario
    public function create()
    {
        $roles = Roles::all(); // Obtener todos los roles
        return view('users.create', compact('roles'));
    }

    // Guardar un nuevo usuario
    public function store(Request $request){
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellidoP' => ['required', 'string', 'max:255'],
            'apellidoM' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_id' => ['required', 'exists:roles,id'],
            'password' => ['required', 'string', 'min:8']
        ]);

        $user = User::create([
            'nombre' => $request->nombre,
            'apellidoP' => $request->apellidoP,
            'apellidoM' => $request->apellidoM,
            'email' => $request->email,
            'role_id' => $request->role_id, // Asignación del rol
            'password' => bcrypt($request->password), // Encriptar contraseña
        ]);

        Auth::login($user);

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
    }

    // Mostrar formulario de edición de usuario
    public function edit(User $user, $id){
        $user = User::all()->find($id);
        $roles = Roles::all();
        return view('users.edit', compact('user', 'roles'));
    }

    // Actualizar el usuario
    public function update(Request $request, User $user){

        $user = User::find($request->id);

        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellidoP' => ['required', 'string', 'max:255'],
            'apellidoM' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_id' => ['required', 'exists:roles,id'],
        ]);

        $user->update([
            'nombre' => $request->nombre,
            'apellidoP' => $request->apellidoP,
            'apellidoM' => $request->apellidoM,
            'email' => $request->email,
            'role_id' => $request->role_id
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
    }

    // Eliminar un usuario
    public function destroy(User $user, $id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente');
    }
}
