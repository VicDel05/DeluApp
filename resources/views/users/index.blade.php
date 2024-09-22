@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')

{{-- <div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
    <h1 class="text-3xl font-bold mb-4">Usuarios</h1>

    @if (session('success'))
        <div class="alert alert-success bg-green-100 border border-green-500 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3 bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">Crear Usuario</a>

    <table class="table table-striped w-full mb-4">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Rol</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="px-4 py-2">{{ $user->id }}</td>
                    <td class="px-4 py-2">{{ $user->nombre }} {{ $user->apellidoP }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2">{{ $user->role->nombre ?? 'Sin Rol' }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('users.edit', [($user->id)]) }}" class="btn btn-warning btn-sm bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                        <form action="{{ route('users.delete', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div> --}}

<div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
    <h1 class="text-4xl font-bold mb-6 text-gray-800">Usuarios</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('users.create') }}" class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded shadow">
            Crear Usuario
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full table-auto bg-white shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-200 text-left text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6">ID</th>
                    <th class="py-3 px-6">Nombre</th>
                    <th class="py-3 px-6">Email</th>
                    <th class="py-3 px-6">Rol</th>
                    <th class="py-3 px-6">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                @foreach($users as $user)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="py-3 px-6">{{ $user->id }}</td>
                        <td class="py-3 px-6">{{ $user->nombre }} {{ $user->apellidoP }}</td>
                        <td class="py-3 px-6">{{ $user->email }}</td>
                        <td class="py-3 px-6">{{ $user->role->nombre ?? 'Sin Rol' }}</td>
                        <td class="py-3 px-6 flex space-x-2">
                            <a href="{{ route('users.edit', [($user->id)]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded shadow">
                                Editar
                            </a>
                            <form action="{{ route('users.delete', $user->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded shadow">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
