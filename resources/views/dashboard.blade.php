@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="container mt-5">
        <h1 class="text-3xl font-bold mb-4">Bienvenido al Dashboard, {{ Auth::user()->nombre }} {{ Auth::user()->apellidoP }}</h1>
      
        <div class="container mt-5">
          <div class="flex justify-center flex-wrap">
            <div class="w-full md:w-1/3 xl:w-1/3 p-4">
              <div class="bg-blue-100 rounded shadow-md p-4 text-center">
                <h5 class="text-lg font-bold mb-2">Usuarios</h5>
                <a href="/admin/users" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ir</a>
              </div>
            </div>
            <div class="w-full md:w-1/3 xl:w-1/3 p-4">
              <div class="bg-blue-100 rounded shadow-md p-4 text-center">
                <h5 class="text-lg font-bold mb-2">Categorías</h5>
                <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ir</a>
              </div>
            </div>
            <div class="w-full md:w-1/3 xl:w-1/3 p-4">
              <div class="bg-blue-100 rounded shadow-md p-4 text-center">
                <h5 class="text-lg font-bold mb-2">Productos</h5>
                <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ir</a>
              </div>
            </div>
          </div>
          <div class="flex justify-center flex-wrap mt-4">
            <div class="w-full md:w-1/3 xl:w-1/3 p-4">
              <div class="bg-blue-100 rounded shadow-md p-4 text-center">
                <h5 class="text-lg font-bold mb-2">Ventas</h5>
                <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ir</a>
              </div>
            </div>
            <div class="w-full md:w-1/3 xl:w-1/3 p-4">
              <div class="bg-blue-100 rounded shadow-md p-4 text-center">
                <h5 class="text-lg font-bold mb-2">Reportes</h5>
                <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ir</a>
              </div>
            </div>
            <div class="w-full md:w-1/3 xl:w-1/3 p-4">
              <div class="bg-blue-100 rounded shadow-md p-4 text-center">
                <h5 class="text-lg font-bold mb-2">Perfil</h5>
                <a href="/acount" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ir</a>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
