@extends('layouts.app')

@section('title', 'Inicio de sesión')

@section('content')

    <div class="flex justify-center items-center min-h-screen bg-gray-100">
      <div class="flex flex-col md:flex-row bg-white shadow-lg rounded-lg overflow-hidden w-full md:w-3/4">
          <!-- Logo a la izquierda -->
          <div class="w-full md:w-1/2 bg-white flex justify-center items-center p-4">
              <img src="img/Delu24-logo.png" alt="Logo" class="w-3/4" draggable="false">
          </div>
          
          <!-- Formulario de inicio de sesión -->
          <div class="bg-cyan-700 w-full md:w-1/2 p-6 text-white">
              <h3 class="text-2xl font-bold text-center mb-6">Iniciar sesión</h3>
              
              <form action="{{ route('login.submit') }}" method="POST">
                  @csrf
  
                  <!-- Manejo de errores -->
                  @if($errors->any())
                      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                          <ul>
                              @foreach($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
  
                  <!-- Campo de correo electrónico -->
                  <div class="mb-4">
                      <label for="email" class="block text-sm font-bold mb-2">Correo electrónico</label>
                      <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required value="{{ old('email') }}">
                  </div>
  
                  <!-- Campo de contraseña -->
                  <div class="mb-6">
                      <label for="password" class="block text-sm font-bold mb-2">Contraseña</label>
                      <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                  </div>
  
                  <!-- Botón de envío -->
                  <div class="flex justify-center">
                      <button type="submit" class="bg-sky-600 hover:bg-sky-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                          Iniciar sesión
                      </button>
                  </div>
              </form>
          </div>
      </div>
  </div>
  
@endsection