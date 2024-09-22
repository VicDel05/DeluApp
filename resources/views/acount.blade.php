@extends('layouts.app')

@section('title', 'Perfil')

@section('content')
{{-- <div class="container max-w-4xl mx-auto mt-5 p-4">
    <h1 class="text-5xl font-bold mb-4">Perfil</h1>
    <div class="flex flex-wrap mx-15">
      <div class="w-full md:w-1/2 px-3 mb-3 ">
        <div class="flex justify-center items-center bg-cyan-600 shadow-md rounded p-3">
          <img src="img/gente.png" class="w-36 rounded-t" alt="user-img">
        </div>
      </div>
      <div class="w-full md:w-1/2 px-3 mb-3">
        <div class="bg-cyan-600 shadow-md rounded p-3 text-white">
          <p class="text-lg mb-2 mt-2">Usuario: {{ Auth::user()->nombre }} {{ Auth::user()->apellidoP }} {{ Auth::user()->apellidoM }}</p>
          <p class="text-lg mb-2">Correo: {{ Auth::user()->email }}</p>
          <p class="text-lg mb-2">Rol: {{ Auth::user()->role->nombre }}</p>
          <p class="text-lg mb-2">Registrado el día: {{ Auth::user()->created_at }}</p>
        </div>
      </div>
    </div>
</div> --}}

<div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
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