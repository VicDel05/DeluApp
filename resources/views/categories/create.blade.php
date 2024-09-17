@extends('layouts.app')

@section('title', 'Creae categorías')

@section('content')
<div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
    <h1 class="text-3xl font-bold mb-4">Crear categoría</h1>

    {{-- {{ route('categorires.store') }} --}}
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="block mb-2 text-sm font-bold text-gray-700">Nombre</label>
            <input type="text" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="nombre" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="block mb-2 text-sm font-bold text-gray-700">Descripción</label>
            <input type="text" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="descripcion" name="descripcion" required>
        </div>

        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Crear</button>
    </form>
</div>
@endsection