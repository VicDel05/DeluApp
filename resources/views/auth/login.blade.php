@extends('layouts.app')

@section('title', 'Inicio de sesión')

@section('content')

    <div class="container mt-5">
        <div class="flex justify-center">
          <div class="w-full md:w-1/2 xl:w-1/2 p-4">
            <h3 class="text-lg font-bold text-center mb-4">Iniciar sesión</h3>
            <form action="{{ route('login.submit') }}" method="POST">
              @csrf
      
              @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                  <ul>
                    @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
      
              <div class="mb-3">
                <label for="email" class="block text-sm font-bold mb-2">Correo electrónico</label>
                <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required value="{{ old('email') }}">
              </div>
      
              <div class="mb-3">
                <label for="password" class="block text-sm font-bold mb-2">Contraseña</label>
                <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
              </div>
      
              <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Iniciar sesión</button>
              </div>
            </form>
          </div>
        </div>
        {{-- <a href="/register" class="text-blue-500 hover:text-blue-700">Otra pagina</a> --}}
      </div>
@endsection