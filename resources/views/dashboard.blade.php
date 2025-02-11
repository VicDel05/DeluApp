{{-- @extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="container mx-auto p-4 pt-10 md:p-6 lg:p-12">
        <h1 class="text-4xl font-bold mb-6 text-gray-800">Bienvenido Administrador, {{ Auth::user()->nombre }} {{ Auth::user()->apellidoP }}</h1>
      
        <div class="container text-white">
          <div class="flex justify-center flex-wrap">
            <div class="w-1/2 md:w-1/3 xl:w-1/3 p-4">
              <a href="/users" class="font-bold py-2 px-4 rounded">
                <div class="bg-sky-600 hover:bg-sky-700 rounded shadow-md p-6 text-center">
                  <h5 class="text-lg font-bold">Usuarios</h5>
                </div>
              </a>
            </div>
            <div class="w-1/2 md:w-1/3 xl:w-1/3 p-4">
              <a href="/categories" class="font-bold py-2 px-4 rounded">
                <div class="bg-sky-600 hover:bg-sky-700 rounded shadow-md p-6 text-center">
                  <h5 class="text-lg font-bold">Categorías</h5>
                </div>
              </a>
            </div>
            <div class="w-full md:w-1/3 xl:w-1/3 p-4">
              <a href="/products" class="font-bold py-2 px-4 rounded">
                <div class="bg-sky-600 hover:bg-sky-700 rounded shadow-md p-6 text-center">
                  <h5 class="text-lg font-bold">Productos</h5>
                </div>
              </a>
            </div>
          </div>
          <div class="flex justify-center flex-wrap mt-4">
            <div class="w-1/2 md:w-1/3 xl:w-1/3 p-4">
              <a href="/sales" class="font-bold py-2 px-4 rounded">
                <div class="bg-sky-600 hover:bg-sky-700 rounded shadow-md p-6 text-center">
                  <h5 class="text-lg font-bold">Ventas</h5>
                </div>
              </a>
            </div>
            <div class="w-1/2 md:w-1/3 xl:w-1/3 p-4">
            <a href="/reports" class="font-bold py-2 px-4 rounded">
              <div class="bg-sky-600 hover:bg-sky-700 rounded shadow-md p-6 text-center">
                <h5 class="text-lg font-bold">Reportes</h5>
              </div>
            </a>
            </div>
            <div class="w-full md:w-1/3 xl:w-1/3 p-4">
            <a href="/acount" class="font-bold py-2 px-4 rounded">
              <div class="bg-sky-600 hover:bg-sky-700rounded shadow-md p-6 text-center">
                <h5 class="text-lg font-bold">Perfil</h5>
              </div>
            </a>
            </div>
          </div>
        </div>
    </div>
@endsection --}}
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto p-6 pt-10 md:p-8 lg:p-12">
    <h1 class="text-4xl font-extrabold text-gray-800 text-center mb-8 animate-fade-in">
        Bienvenido, {{ Auth::user()->nombre }} {{ Auth::user()->apellidoP }}
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
            $menuItems = [
                ['name' => 'Usuarios', 'route' => '/users'],
                ['name' => 'Categorías', 'route' => '/categories'],
                ['name' => 'Productos', 'route' => '/products'],
                ['name' => 'Ventas', 'route' => '/sales'],
                ['name' => 'Reportes', 'route' => '/reports'],
                ['name' => 'Perfil', 'route' => '/acount']
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

<!-- Animaciones personalizadas -->
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
