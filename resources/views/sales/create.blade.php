@extends('layouts.app')

@section('title', 'Registrar venta')

@section('content')
<div class="container mx-auto p-4 pt-10 md:p-6 lg:p-12">
    <h1 class="text-3xl font-bold mb-4">Registrar venta</h1>

    <form method="POST" action="{{ route('sales.store') }}">
        @csrf
        <div class="mb-3">
            <label for="users_id" class="block mb-2 text-sm font-bold text-gray-700">Usuario</label>
            <p class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">{{ Auth::user()->nombre }}</p>
            <input type="text" name="users_id" id="users_id" value="{{ Auth::user()->id }}" hidden>

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
            <table class="min-w-full table-auto bg-white shadow-md rounded-lg overflow-hidden mt-5">
                <thead>
                    <tr class="bg-gray-200 text-left text-gray-600 uppercase text-sm leading-normal">
                        <th class="px-4 py-2">Producto</th>
                        <th class="px-4 py-2">Precio</th>
                        <th class="px-4 py-2">Cantidad</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    @foreach($products as $product)
                    {{-- <div class="mb-2">
                        <label>
                            <input type="checkbox" name="products[{{ $product->id }}]" value="{{ $product->id }}">
                            {{ $product->nombre }} (Stock: {{ $product->stock }})
                        </label>
                        <input type="number" name="stock[{{ $product->id }}]" placeholder="Cantidad" class="ml-2 p-2 border w-24">
                    </div> --}}
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $product->nombre }}</td>
                            <td class="border px-4 py-2">{{ $product->precio }}</td>
                            <td class="border px-4 py-2">
                                <input type="hidden" name="products[{{ $product->id }}][id]" value="{{ $product->id }}">
                                <input type="hidden" name="products[{{ $product->id }}][precio]" value="{{ $product->precio }}">
                                <input type="number" name="products[{{ $product->id }}][stock]" value="0" min="0" max="{{ $product->stock }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                {{-- <input type="number" name="products[{{ $product->id }}]" min="0" max="{{ $product->stock }}" value="0" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">  --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <label for="total">total para prueba</label>
            <input type="text" name="total" id="total"> --}}

        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mt-3 rounded">Registrar venta</button>
    </form>
</div>
   
@endsection
