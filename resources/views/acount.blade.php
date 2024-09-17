@extends('layouts.app')

@section('title', 'Perfil')

@section('content')
<div class="container max-w-4xl mx-auto mt-5">
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
          <p class="text-lg mb-2">Registrado el día: {{ Auth::user()->created_at }}</p>
        </div>
      </div>
    </div>
</div>
@endsection