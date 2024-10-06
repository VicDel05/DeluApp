@extends('layouts.app')

@section('title', 'Productos')

@section('content')

<div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
    <h1 class="text-4xl font-bold mb-6 text-gray-800">Productos</h1>

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
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        {{ $products->links() }}
    </div>
</div>
@endsection
