@extends('layouts.app')

@section('title', 'Categorías')

@section('content')

<div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
    <h1 class="text-4xl font-bold mb-6 text-gray-800">Categorías</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('categories.create') }}" class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded shadow">
            Crear Categoría
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full table-auto bg-white shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-200 text-left text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6">ID</th>
                    <th class="py-3 px-6">Nombre</th>
                    <th class="py-3 px-6">Descripción</th>
                    <th class="py-3 px-6">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                @foreach($categories as $categorie)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="py-3 px-6">{{ $categorie->id }}</td>
                        <td class="py-3 px-6">{{ $categorie->nombre }}</td>
                        <td class="py-3 px-6">{{ $categorie->descripcion }}</td>
                        <td class="py-3 px-6 flex space-x-2">
                            <a href="{{ route('categories.edit', [($categorie->id)]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded shadow">
                                Editar
                            </a>
                            <form action="{{ route('categories.delete', $categorie->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?');" class="inline">
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
