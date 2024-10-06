@extends('layouts.app')

@section('title', 'Productos')

@section('content')

<div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
    <h1 class="text-4xl font-bold mb-6 text-gray-800">Productos</h1>

    @if (session('success'))
        <div class="alert alert-success bg-green-100 border border-green-500 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('products.create') }}" class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded shadow">
            Registrar producto
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full table-auto bg-white shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-200 text-left text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6">ID</th>
                    <th class="py-3 px-6">Nombre</th>
                    <th class="py-3 px-6">Descripción</th>
                    <th class="py-3 px-6">Precio</th>
                    <th class="py-3 px-6">Inventario</th>
                    <th class="py-3 px-6">Categoría</th>	
                    <th class="py-3 px-6">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                @foreach($products as $product)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="py-3 px-6">{{ $product->id }}</td>
                        <td class="py-3 px-6">{{ $product->nombre }}</td>
                        <td class="py-3 px-6">{{ $product->descripcion }}</td>
                        <td class="py-3 px-6">{{ $product->precio }}</td>
                        <td class="py-3 px-6">{{ $product->stock }}</td>
                        <td class="py-3 px-6">{{ $product->categories->nombre ?? 'Sin categoría' }}</td>
                        <td class="py-3 px-6 flex space-x-2">
                            <a href="{{ route('products.edit', [($product->id)]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded shadow">Editar</a>
                            <form action="{{ route('products.delete', $product->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded shadow">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        {{ $products->links() }}
    </div>
</div>
@endsection
