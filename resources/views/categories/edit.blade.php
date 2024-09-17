@extends('layouts.app')

@section('title', 'Editar usuario')

@section('content')
<div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
    <h1 class="text-3xl font-bold mb-4">Editar categoría</h1>

    <form method="POST" action="{{ route('categories.update', $categories->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="block mb-2 text-sm font-bold text-gray-700">Nombre</label>
            <input type="text" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="nombre" name="nombre" value="{{ $categories->nombre }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="block mb-2 text-sm font-bold text-gray-700">Apellido paterno</label>
            <input type="text" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="descripcion" name="descripcion" value="{{ $categories->descripcion }}" required>
        </div>

        <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Actualizar</button>
    </form>
</div>
@endsection