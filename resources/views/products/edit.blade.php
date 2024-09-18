@extends('layouts.app')

@section('title', 'Editar productos')

@section('content')

<div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
    <h1 class="text-3xl font-bold mb-4">Editar productos</h1>

    <form method="POST" action="{{ route('products.update', $products->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="block mb-2 text-sm font-bold text-gray-700">Nombre</label>
            <input type="text" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="nombre" name="nombre" value="{{ $products->nombre }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="block mb-2 text-sm font-bold text-gray-700">Apellido paterno</label>
            <input type="text" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="descripcion" name="descripcion" value="{{ $products->descripcion }}" required>
        </div>

        <div class="mb-3">
            <label for="precio" class="block mb-2 text-sm font-bold text-gray-700">Precio</label>
            <input type="text" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="precio" name="precio" value="{{ $products->precio }}" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="block mb-2 text-sm font-bold text-gray-700">Stock</label>
            <input type="text" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="stock" name="stock" value="{{ $products->stock }}" required>
        </div>

        <div class="mb-3">
            <label for="categories_id" class="block mb-2 text-sm font-bold text-gray-700">Categoría</label>
            <select name="categories_id" id="categories_id" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" required>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ $categorie->id == $products->categories_id ? 'selected' : '' }}>{{ $categorie->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Actualizar</button>
    </form>
</div>
@endsection
