@extends('layouts.app')

@section('title', 'Reporte de inventario')

@section('content')
{{-- <div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">Reporte de Ventas</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="p-4 bg-white shadow rounded-lg">
            <h2 class="text-xl font-semibold">Total de Ventas</h2>
            <p class="text-2xl">{{ $totalSales }}</p>
        </div>

        <div class="p-4 bg-white shadow rounded-lg">
            <h2 class="text-xl font-semibold">Total en ventas</h2>
            <p class="text-2xl">${{ $totalPrice  }}</p>
        </div>

        <div class="p-4 bg-white shadow rounded-lg">
            <h2 class="text-xl font-semibold">Empleado con mayor ventas</h2>
            <p class="text-2xl">{{ $mostEmployeeSale }}</p>
        </div>

        <div class="p-4 bg-white shadow rounded-lg">
            <h2 class="text-xl font-semibold">Porcentaje de Productos con Bajo Stock</h2>
            <p class="text-2xl">{{ number_format($lowStockPercentage, 2) }}%</p>
        </div>
    </div>

    <table class="min-w-full table-auto bg-white shadow-md rounded-lg overflow-hidden mt-5">
        <thead>
            <tr class="bg-gray-200 text-left text-gray-600 uppercase text-sm leading-normal">
                <th class="border px-4 py-2">ID Venta</th>
                <th class="border px-4 py-2">Fecha</th>
                <th class="border px-4 py-2">Usuario</th>
                <th class="border px-4 py-2">Total</th>
                <th class="border px-4 py-2">Productos</th>
            </tr>
        </thead>
        <tbody class="text-gray-700 text-sm">
            @foreach ($ventas as $venta)
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="border px-4 py-2">{{ $venta->id }}</td>
                    <td class="border px-4 py-2">{{ $venta->fecha_venta }}</td>
                    <td class="border px-4 py-2">{{ $venta->users->nombre }}</td>
                    <td class="border px-4 py-2">${{ number_format($venta->total, 2) }}</td>
                    <td class="border px-4 py-2">
                        <ul>
                            @foreach ($venta->products as $product)
                                <li>{{ $product->nombre }} - {{ $product->pivot->cantidad }} unidades (Subtotal: ${{ $product->precio * $product->pivot->cantidad }})</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div> --}}

<div class="container mx-auto p-4 md:p-8 lg:p-12">
    <h1 class="text-3xl font-extrabold mb-6 text-gray-800 text-center">Reporte de Ventas</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($ventas as $venta)
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Venta #{{ $venta->id }}</h2>
                <span class="text-sm text-gray-500">{{ $venta->fecha_venta }}</span>
            </div>

            <div class="border-t border-gray-200 pt-4">
                <h3 class="text-gray-600 text-sm font-medium mb-2">Empleado</h3>
                <p class="text-gray-800 text-base font-semibold mb-4">{{ $venta->users->nombre }} {{ $venta->users->apellidoP }}</p>
            </div>

            <div class="border-t border-gray-200 pt-4">
                <h3 class="text-gray-600 text-sm font-medium mb-2">Productos Vendidos</h3>
                <ul class="text-gray-700 text-sm space-y-1">
                    @foreach ($venta->products as $product)
                        <li class="flex justify-between">
                            <span>{{ $product->nombre }} (x{{ $product->pivot->cantidad }})</span>
                            <span class="text-gray-600">${{ number_format($product->precio * $product->pivot->cantidad, 2) }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="border-t border-gray-200 pt-4 mt-4">
                <div class="flex justify-between items-center">
                    <span class="text-sm font-medium text-gray-600">Total de Venta</span>
                    <span class="text-lg font-bold text-green-600">${{ number_format($venta->total, 2) }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <br>
    {{ $ventas->links() }}
</div>

@endsection