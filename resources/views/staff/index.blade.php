@extends('layouts.app')

@section('title', 'Productos')

@section('content')

<div class="container mx-auto p-6 pt-10 md:p-8 lg:p-12">
    <h1 class="text-4xl font-extrabold text-gray-800 text-center mb-6 animate-fade-in">Productos</h1>

    <div class="overflow-x-auto bg-white shadow-lg rounded-lg border border-gray-200 animate-slide-in">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-cyan-700 text-white text-left uppercase text-sm font-semibold">
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
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition duration-200">
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
    </div>

    <div class="mt-6 flex justify-center">
        {{ $products->links('pagination::tailwind') }}
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
