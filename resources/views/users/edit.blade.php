@extends('layouts.app')

@section('title', 'Editar usuario')

@section('content')

<div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
    <h1 class="text-4xl font-bold mb-6 text-gray-800">Editar Usuario</h1>

    {{-- {{ route('users.update', $user) }} --}}
    <form method="POST" action="{{ route('users.update', $user->id) }}" class="bg-white shadow-lg rounded-lg p-6">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label for="nombre" class="block text-sm font-bold text-gray-700 mb-2">Nombre</label>
            <input type="text" class="w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent" id="nombre" name="nombre" value="{{ $user->nombre }}" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-6">
                <label for="apellidoP" class="block text-sm font-bold text-gray-700 mb-2">Apellido paterno</label>
                <input type="text" class="w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent" id="apellidoP" name="apellidoP" value="{{ $user->apellidoP }}" required>
            </div>
    
            <div class="mb-6">
                <label for="apellidoM" class="block text-sm font-bold text-gray-700 mb-2">Apellido materno</label>
                <input type="text" class="w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent" id="apellidoM" name="apellidoM" value="{{ $user->apellidoM }}" required>
            </div>
        </div>

        

        <div class="mb-6">
            <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email</label>
            <input type="email" class="w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div class="mb-6">
            <label for="role_id" class="block text-sm font-bold text-gray-700 mb-2">Rol</label>
            <select name="role_id" id="role_id" class="w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent" required>
                <option value="" disabled selected>Selecciona un rol</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>{{ $role->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-center">
            <button type="submit" class="bg-slate-500 hover:bg-slate-700 text-white font-bold py-2 px-6 rounded-lg shadow-lg transition duration-200">
                Actualizar
            </button>
        </div>
    </form>
</div>
@endsection
