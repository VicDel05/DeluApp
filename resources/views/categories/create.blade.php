@extends('layouts.app')

@section('title', 'Crear categorías')

@section('content')

<div class="container mx-auto p-4 pt-10 md:p-6 lg:p-12">
    <h1 class="text-4xl font-bold mb-6 text-gray-800">Crear categoría</h1>

    <form method="POST" action="{{ route('categories.store') }}" class="bg-white shadow-lg rounded-lg p-6">
        @csrf
        <div class="mb-6">
            <label for="nombre" class="block text-sm font-bold text-gray-700 mb-2">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent" placeholder="Nombre del usuario" required>
        </div>

        <div class="mb-6">
            <label for="descripcion" class="block text-sm font-bold text-gray-700 mb-2">Descripción</label>
            <input type="text" id="descripcion" name="descripcion" class="w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent" placeholder="Descripción de la categoría" required>
        </div>

        <div class="flex justify-center">
            <button type="submit" class="bg-slate-500 hover:bg-slate-700 text-white font-bold py-2 px-6 rounded-lg shadow-lg transition duration-200">
                Crear categoría
            </button>
        </div>
    </form>
</div>
@endsection