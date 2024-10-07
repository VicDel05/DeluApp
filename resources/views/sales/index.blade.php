@extends('layouts.app')

@section('title', 'Ventas')

@section('content')

<div class="container mx-auto p-4 pt-10 md:p-6 lg:p-12">
    <h1 class="text-4xl font-bold mb-4">Ventas</h1>

    @if (session('success'))
        <div class="alert alert-success bg-green-100 border border-green-500 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (Auth::check() && Auth::user()->role_id == '2')
        <a href="{{ route('sales.create') }}" class="btn btn-primary mb-3 bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded">Registrar venta</a>
    @endif

    <table class="min-w-full table-auto bg-white shadow-md rounded-lg overflow-hidden mt-5">
        <thead>
            <tr class="bg-gray-200 text-left text-gray-600 uppercase text-sm leading-normal">
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Usuario</th>
                <th class="px-4 py-2">Fecha</th>
                <th class="px-4 py-2">Total</th>
            </tr>
        </thead>
        <tbody class="text-gray-700 text-sm">
            @foreach($sales as $sale)
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $sale->id }}</td>
                    <td class="px-4 py-2">{{ $sale->users->nombre }}</td>
                    <td class="px-4 py-2">{{ $sale->fecha_venta }}</td>
                    <td class="px-4 py-2">{{ $sale->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
        {{ $sales->links() }}
</div>
@endsection
