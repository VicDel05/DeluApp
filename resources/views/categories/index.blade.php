@extends('layouts.app')

@section('title', 'Categorías')

@section('content')

<div class="container mx-auto p-6 pt-10 md:p-8 lg:p-12">
    <h1 class="text-4xl font-extrabold text-gray-800 text-center mb-6 animate-fade-in">Categorías</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 shadow-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <a href="{{ route('categories.create') }}" class="bg-cyan-600 hover:bg-cyan-700 text-white font-bold py-3 px-5 rounded-lg shadow-md transition-transform transform hover:scale-105">
            + Crear Categoría
        </a>
    </div>

    <div class="overflow-x-auto bg-white shadow-lg rounded-lg border border-gray-200 animate-slide-in">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-cyan-700 text-white text-left uppercase text-sm font-semibold">
                    <th class="py-3 px-6">ID</th>
                    <th class="py-3 px-6">Nombre</th>
                    <th class="py-3 px-6">Descripción</th>
                    <th class="py-3 px-6">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                @foreach($categories as $categorie)
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition duration-200">
                        <td class="py-4 px-6">{{ $categorie->id }}</td>
                        <td class="py-3 px-6">{{ $categorie->nombre }}</td>
                        <td class="py-3 px-6">{{ $categorie->descripcion }}</td>
                        <td class="py-4 px-6 flex justify-center space-x-3">
                            <a href="{{ route('categories.edit', [($categorie->id)]) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-transform transform hover:scale-105">
                                 Editar
                            </a>
                            <form action="{{ route('categories.delete', $categorie->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-transform transform hover:scale-105">
                                     Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6 flex justify-center">
        {{ $categories->links('pagination::tailwind') }}
    </div>
</div>
<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes slide-in {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-fade-in {
        animation: fade-in 0.6s ease-out;
    }

    .animate-slide-in {
        animation: slide-in 0.8s ease-in-out;
    }
</style>
@endsection
