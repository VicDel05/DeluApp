@extends('layouts.app')

@section('title', 'Editar usuario')

@section('content')
<div class="container mx-auto p-4 pt-10 md:p-6 lg:p-12">
    <h1 class="text-4xl font-bold mb-6 text-gray-800">Editar categoría</h1>

    <form method="POST" action="{{ route('categories.update', $categories->id) }}" class="bg-white shadow-lg rounded-lg p-6">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label for="nombre" class="block text-sm font-bold text-gray-700 mb-2">Nombre</label>
            <input type="text" class="w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent" id="nombre" name="nombre" value="{{ $categories->nombre }}" required>
        </div>

        <div class="mb-6">
            <label for="descripcion" class="block text-sm font-bold text-gray-700 mb-2">Descripción</label>
            <input type="text" class="w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent" id="descripcion" name="descripcion" value="{{ $categories->descripcion }}" required>
        </div>

        <div class="flex justify-center">
            <button type="submit" class="bg-slate-500 hover:bg-slate-700 text-white font-bold py-2 px-6 rounded-lg shadow-lg transition duration-200">
                Actualizar
            </button>
        </div>
    </form>
</div>
@endsection