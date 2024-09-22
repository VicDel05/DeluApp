@extends('layouts.app')

@section('title', 'Crear usuario')

@section('content')

{{-- <div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
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
</div> --}}

{{-- <div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
    <h1 class="text-3xl font-bold mb-4">Crear Usuario</h1>
  
    <form method="POST" action="{{ route('users.store') }}">
      @csrf
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
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
  
        <div class="flex mb-3">
          <button type="submit" class="bg-slate-500 hover:bg-slate-700 text-white font-bold py-2 px-4 rounded">Crear</button>
        </div>
      </div>
    </form>
</div> --}}

<div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
    <h1 class="text-4xl font-bold mb-6 text-gray-800">Crear Usuario</h1>

    <form method="POST" action="{{ route('users.store') }}" class="bg-white shadow-lg rounded-lg p-6">
        @csrf
        <div class="mb-6">
            <label for="nombre" class="block text-sm font-bold text-gray-700 mb-2">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent" placeholder="Nombre del usuario" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-6">
                <label for="apellidoP" class="block text-sm font-bold text-gray-700 mb-2">Apellido Paterno</label>
                <input type="text" id="apellidoP" name="apellidoP" class="w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent" placeholder="Apellido Paterno" required>
            </div>

            <div class="mb-6">
                <label for="apellidoM" class="block text-sm font-bold text-gray-700 mb-2">Apellido Materno</label>
                <input type="text" id="apellidoM" name="apellidoM" class="w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent" placeholder="Apellido Materno" required>
            </div>
        </div>

        <div class="mb-6">
            <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Correo Electrónico</label>
            <input type="email" id="email" name="email" class="w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent" placeholder="email@example.com" required>
        </div>

        <div class="mb-6">
            <label for="password" class="block text-sm font-bold text-gray-700 mb-2">Contraseña</label>
            <input type="password" id="password" name="password" class="w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent" placeholder="********" required>
        </div>

        <div class="mb-6">
            <label for="role_id" class="block text-sm font-bold text-gray-700 mb-2">Rol</label>
            <select id="role_id" name="role_id" class="w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent" required>
                <option value="" disabled selected>Selecciona un rol</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-center">
            <button type="submit" class="bg-slate-500 hover:bg-slate-700 text-white font-bold py-2 px-6 rounded-lg shadow-lg transition duration-200">
                Crear Usuario
            </button>
        </div>
    </form>
</div>

@endsection
