@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
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
            {{-- <div class="w-1/2 md:w-1/3 xl:w-1/3 p-4">
              <a href="sales" class="font-bold py-2 px-4 rounded">
                <div class="bg-sky-600 hover:bg-sky-700 rounded shadow-md p-6 text-center">
                  <h5 class="text-lg font-bold">Ventas</h5>
                </div>
              </a>
            </div> --}}
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
@endsection
