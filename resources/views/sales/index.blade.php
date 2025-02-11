@extends('layouts.app')

@section('title', 'Ventas')

@section('content')

<div class="container mx-auto p-4 pt-10 md:p-6 lg:p-12">
    <h1 class="text-4xl font-extrabold text-gray-800 text-center mb-6 animate-fade-in">Ventas</h1>

    @if (session('success'))
        <div class="alert alert-success bg-green-100 border border-green-500 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (Auth::check() && Auth::user()->role_id == '2')
        <a href="{{ route('sales.create') }}" class="overflow-x-auto bg-cyan-600 hover:bg-cyan-700 text-white font-bold py-3 px-5 rounded-lg shadow-md transition-transform transform hover:scale-105">Registrar venta</a>
    @endif

    <table class="min-w-full table-auto bg-white shadow-md rounded-lg overflow-hidden mt-5 animate-slide-in">
        <thead>
            <tr class="bg-cyan-700 text-white text-left uppercase text-sm font-semibold">
                <th class="py-3 px-6">ID</th>
                <th class="py-3 px-6">Usuario</th>
                <th class="py-3 px-6">Fecha</th>
                <th class="py-3 px-6">Total</th>
            </tr>
        </thead>
        <tbody class="text-gray-700 text-sm">
            @foreach($sales as $sale)
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="py-3 px-6">{{ $sale->id }}</td>
                    <td class="py-3 px-6">{{ $sale->users->nombre }}</td>
                    <td class="py-3 px-6">{{ $sale->fecha_venta }}</td>
                    <td class="py-3 px-6">{{ $sale->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
        {{ $sales->links() }}
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
