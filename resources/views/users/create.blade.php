@extends('layouts.app')

@section('title', 'Crear usuario')

@section('content')

<div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
    <h1 class="text-3xl font-bold mb-4">Crear Usuario</h1>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="block mb-2 text-sm font-bold text-gray-700">Nombre</label>
            <input type="text" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="nombre" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="apellidoP" class="block mb-2 text-sm font-bold text-gray-700">Apellido paterno</label>
            <input type="text" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="apellidoP" name="apellidoP" required>
        </div>

        <div class="mb-3">
            <label for="apellidoM" class="block mb-2 text-sm font-bold text-gray-700">Apellido materno</label>
            <input type="text" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="apellidoM" name="apellidoM" required>
        </div>

        <div class="mb-3">
            <label for="email" class="block mb-2 text-sm font-bold text-gray-700">Email</label>
            <input type="email" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="block mb-2 text-sm font-bold text-gray-700">Contraseña</label>
            <input type="password" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="password" name="password" required>
        </div>

        <div class="mb-3">
            <label for="role_id" class="block mb-2 text-sm font-bold text-gray-700">Rol</label>
            <select name="role_id" id="role_id" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" required>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Crear</button>
    </form>
</div>
@endsection
