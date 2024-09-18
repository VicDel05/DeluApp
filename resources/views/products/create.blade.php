@extends('layouts.app')

@section('title', 'Registrar producto')

@section('content')

<div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
    <h1 class="text-3xl font-bold mb-4">Registrar producto</h1>

    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="block mb-2 text-sm font-bold text-gray-700">Nombre</label>
            <input type="text" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="nombre" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="block mb-2 text-sm font-bold text-gray-700">Descripción</label>
            <input type="text" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="descripcion" name="descripcion" required>
        </div>

        <div class="mb-3">
            <label for="precio" class="block mb-2 text-sm font-bold text-gray-700">Precio</label>
            <input type="text" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="precio" name="precio" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="block mb-2 text-sm font-bold text-gray-700">Stock</label>
            <input type="text" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="stock" name="stock" required>
        </div>

        <div class="mb-3">
            <label for="categories_id" class="block mb-2 text-sm font-bold text-gray-700">Categoria</label>
            <select name="categories_id" id="categories_id" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" required>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Crear</button>
    </form>
</div>
@endsection
