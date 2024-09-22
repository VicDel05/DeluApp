@extends('layouts.app')

@section('title', 'Ventas')

@section('content')

<div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
    <h1 class="text-3xl font-bold mb-4">Ventas</h1>

    @if (session('success'))
        <div class="alert alert-success bg-green-100 border border-green-500 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (Auth::check() && Auth::user()->role_id == '1')

        <table class="table table-striped w-full mb-4">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Producto</th>
                    <th class="px-4 py-2">Venta</th>
                    <th class="px-4 py-2">Cantidad</th>
                    <th class="px-4 py-2">Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $sale)
                    <tr>
                        <td class="px-4 py-2">{{ $sale->id }}</td>
                        <td class="px-4 py-2">{{ $sale->products_id }}</td>
                        <td class="px-4 py-2">{{ $sale->sales_id }}</td>
                        <td class="px-4 py-2">{{ $sale->cantidad }}</td>
                        <td class="px-4 py-2">{{ $sale->precio_unitario }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if (Auth::check() && Auth::user()->role_id == '2')
        <a href="{{ route('sales.create') }}" class="btn btn-primary mb-3 bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded">Registrar venta</a>
        <table class="table table-striped w-full mb-4">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Usuario</th>
                <th class="px-4 py-2">Fecha</th>
                <th class="px-4 py-2">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
                <tr>
                    <td class="px-4 py-2">{{ $sale->id }}</td>
                    <td class="px-4 py-2">{{ $sale->users_id }}</td>
                    <td class="px-4 py-2">{{ $sale->fecha_venta }}</td>
                    <td class="px-4 py-2">{{ $sale->total }}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
    @endif
    
</div>
@endsection
