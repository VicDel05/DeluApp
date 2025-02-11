@extends('layouts.app')

@section('title', 'Reportes')

@section('content')
<div class="container mx-auto p-6 pt-10 md:p-8 lg:p-12">
    <h1 class="text-4xl font-extrabold text-gray-800 text-center mb-8 animate-fade-in">
        Reportes
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
            $menuItems = [
                ['name' => 'Reporte de inventario', 'route' => '/reports/stock'],
                ['name' => 'Reporte de usuarios', 'route' => '/reports/user'],
                ['name' => 'Reporte de ventas', 'route' => '/reports/sale']
            ];
        @endphp

        @foreach ($menuItems as $item)
        <a href="{{ $item['route'] }}" class="transform hover:scale-105 transition-transform duration-300">
            <div class="bg-cyan-700 hover:bg-cyan-800 text-white rounded-xl shadow-lg p-6 text-center flex flex-col items-center justify-center animate-slide-in">
                <h5 class="text-lg font-semibold">{{ $item['name'] }}</h5>
                <span class="mt-2 w-10 h-1 bg-white rounded-full"></span>
            </div>
        </a>
        @endforeach
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