@extends('layouts.app')

@section('title', 'Reporte de inventario')

@section('content')
<div class="container mx-auto p-4" id="stockReport">
    <h1 class="text-3xl font-bold mb-4">Reporte de Stock</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="p-4 bg-white shadow rounded-lg">
            <h2 class="text-xl font-semibold">Total de Productos</h2>
            <p class="text-2xl">{{ $totalProducts }}</p>
        </div>

        <div class="p-4 bg-white shadow rounded-lg">
            <h2 class="text-xl font-semibold">Productos con Bajo Stock</h2>
            <p class="text-2xl">{{ $lowStockProducts->count() }}</p>
        </div>

        <div class="p-4 bg-white shadow rounded-lg">
            <h2 class="text-xl font-semibold">Productos Agotados</h2>
            <p class="text-2xl">{{ $outOfStockProducts->count() }}</p>
        </div>

        <div class="p-4 bg-white shadow rounded-lg">
            <h2 class="text-xl font-semibold">Porcentaje de Productos con Bajo Stock</h2>
            <p class="text-2xl">{{ number_format($lowStockPercentage, 2) }}%</p>
        </div>
    </div>

    <h2 class="text-2xl font-bold mt-6">Detalles de Productos con Bajo Stock</h2>
    <table class="w-full table-auto bg-white shadow rounded-lg mt-4">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lowStockProducts as $product)
                <tr>
                    <td class="border px-4 py-2">{{ $product->id }}</td>
                    <td class="border px-4 py-2">{{ $product->nombre }}</td>
                    <td class="border px-4 py-2">{{ $product->stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="text-2xl font-bold mt-6">Productos Agotados</h2>
    <table class="w-full table-auto bg-white shadow rounded-lg mt-4">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach($outOfStockProducts as $product)
                <tr>
                    <td class="border px-4 py-2">{{ $product->id }}</td>
                    <td class="border px-4 py-2">{{ $product->nombre }}</td>
                    <td class="border px-4 py-2">Agotado</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex justify-center mt-5">
        <button onclick="printSection()" class="bg-slate-500 hover:bg-slate-700 text-white font-bold py-2 px-6 rounded-lg shadow-lg transition duration-200">
            Descargar reporte
        </button>
    </div>
</div>

<script>
    function printSection() {
        var printContent = document.getElementById('stockReport').outerHTML;
        var originalContent = document.body.outerHTML;
      
        document.body.outerHTML = printContent;
        window.print();
        document.body.outerHTML = originalContent;
    }
</script>
@endsection