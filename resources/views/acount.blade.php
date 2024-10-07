@extends('layouts.app')

@section('title', 'Perfil')

@section('content')

<div class="container mx-auto p-4 pt-10 md:p-6 lg:p-12">
  <h1 class="text-4xl font-bold mb-6 text-gray-800">Perfil</h1>
  <div class="flex flex-wrap -mx-4">
    <div class="w-full md:w-1/2 px-4 mb-3">
      <div class="bg-cyan-600 shadow-md rounded p-3 text-white h-56">
        <div class="flex justify-center">
          <img src="img/gente.png" class="w-36 rounded-full mb-3" alt="user-img" draggable="false">
        </div>
        <p class="text-lg mb-2 text-center">Usuario: {{ Auth::user()->nombre }} {{ Auth::user()->apellidoP }} {{ Auth::user()->apellidoM }}</p>
      </div>
    </div>
    <div class="w-full md:w-1/2 px-4 mb-3">
      <div class="bg-white shadow-md rounded p-3 h-56 flex justify-center items-center">
        <ul class="list-none mb-0">
          <li class="flex items-center mb-2">
            <span class="text-gray-600">Correo:</span>
            <span class="ml-2 text-lg">{{ Auth::user()->email }}</span>
          </li>
          <li class="flex items-center mb-2">
            <span class="text-gray-600">Rol:</span>
            <span class="ml-2 text-lg">{{ Auth::user()->role->nombre }}</span>
          </li>
          <li class="flex items-center mb-2">
            <span class="text-gray-600">Registrado el día:</span>
            <span class="ml-2 text-lg">{{ Auth::user()->created_at }}</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection