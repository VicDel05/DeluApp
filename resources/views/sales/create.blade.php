@extends('layouts.app')

@section('title', 'Registrar venta')

@section('content')
<div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
    <h1 class="text-3xl font-bold mb-4">Registrar venta</h1>

    <form method="POST" action="{{ route('sales.store') }}">
        @csrf
        <div class="mb-3">
            <label for="users_id" class="block mb-2 text-sm font-bold text-gray-700">Usuario</label>
            <input type="text" name="users_id" id="users_id" value="{{ Auth::user()->id }}" hidden>
            <p class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">{{ Auth::user()->nombre }}</p>

            <input type="hidden" id="fecha_venta" name="fecha_venta" value="" />
        </div>

        <label for="products" class="block text-gray-700 text-sm font-bold mb-2">Seleccionar Producto(s):</label>
        {{-- @foreach($products as $product)
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">{{ $product->nombre }} (Precio: {{ $product->precio }})</label>
                        <input type="hidden" name="products[{{ $product->id }}][id]" value="{{ $product->id }}">
                        <input type="number" name="products[{{ $product->id }}][cantidad]" value="0" min="1" max="{{ $product->stock }}">
                    </div>
        @endforeach --}}
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Producto</th>
                        <th class="px-4 py-2">Precio</th>
                        <th class="px-4 py-2">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="border px-4 py-2">{{ $product->nombre }}</td>
                            <td class="border px-4 py-2">${{ $product->precio }}
                                {{-- <input type="hidden" name="products[{{ $product->id }}][precio]" value="{{ $product->precio }}"> --}}
                            </td>
                            <td class="border px-4 py-2">
                                <input type="hidden" name="products[{{ $product->id }}][id]" value="{{ $product->id }}">
                                <input type="number" name="products[{{ $product->id }}][cantidad]" value="0" min="0" max="{{ $product->stock }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                {{-- <input type="number" name="products[{{ $product->id }}]" min="0" max="{{ $product->stock }}" value="0" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        {{-- <div class="mb-3">
            <label for="fecha_venta" class="block mb-2 text-sm font-bold text-gray-700">Fecha</label>
            <input type="datetime-local" name="fecha_venta" id="fecha_venta" class="block w-full  text-sm text-gray-700 px-3 py-2 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
        </div> --}}

        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mt-3 rounded">Registrar venta</button>
    </form>
</div>
   
@endsection
