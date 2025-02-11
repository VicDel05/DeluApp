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

        <p for="products" class="block text-gray-700 text-sm font-bold mb-2">Seleccionar Producto(s):</p>
            <table class="min-w-full table-auto bg-white shadow-md rounded-lg overflow-hidden mt-5 mb-3">
                <thead>
                    <tr class="bg-gray-200 text-left text-gray-600 uppercase text-sm leading-normal">
                        <th class="px-4 py-2">Producto</th>
                        <th class="px-4 py-2">Precio</th>
                        <th class="px-4 py-2">Cantidad</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    @foreach($products as $product)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $product->nombre }}</td>
                            <td class="border px-4 py-2">{{ $product->precio }}</td>
                            <td class="border px-4 py-2">
                                <input type="hidden" name="products[{{ $product->id }}][id]" value="{{ $product->id }}">
                                <input type="hidden" name="products[{{ $product->id }}][precio]" value="{{ $product->precio }}">
                                <input type="number" name="products[{{ $product->id }}][stock]" value="0" min="0" max="{{ $product->stock }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        {{-- <div class="flex justify-around gap-5">
            <div class="w-1/2 mb-3">
                <label for="users_id" class="block mb-2 text-sm font-bold text-gray-700">Subtotal</label>
                <input type="text" name="users_id" id="subtotal" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" placeholder="$25">
            </div>
    
            <div class="w-1/2 mb-3">
                <label for="users_id" class="block mb-2 text-sm font-bold text-gray-700">Pago recibido</label>
                <input type="text" name="users_id" id="subtotal" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" placeholder="$50">
            </div>
        </div> --}}
        
        <button type="submit" class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 mt-3 rounded-xl">Registrar venta</button>
    </form>
</div>
   
@endsection
