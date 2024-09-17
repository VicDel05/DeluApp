@extends('layouts.app')

@section('title', 'Registro')

@section('content')

    <div class="container mt-3">
        <div class="flex justify-center">
          <div class="w-full md:w-2/3 xl:w-2/3 p-4">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <h2 class="text-lg font-bold">{{ __('Registro') }}</h2>
                </div>
      
                <form method="POST" action="{{ route('register') }}">
                @csrf
                @if($errors->any())
                  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <ul>
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
      
                <!-- Otros campos como nombre, email, etc. -->
                <div class="mb-4">
                  <label for="nombre" class="block text-sm font-bold mb-2">{{ __('Nombre') }}</label>
                  <input id="nombre" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nombre') border-red-500 @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
      
                  @error('nombre')
                    <span class="text-red-500 text-sm" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
      
                <div class="mb-4">
                  <label for="apellidoP" class="block text-sm font-bold mb-2">{{ __('Apellido paterno') }}</label>
                  <input id="apellidoP" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('apellidoP') border-red-500 @enderror" name="apellidoP" value="{{ old('apellidoP') }}" required autocomplete="apellidoP" autofocus>
      
                  @error('apellidoP')
                    <span class="text-red-500 text-sm" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
      
                <div class="mb-4">
                  <label for="apellidoM" class="block text-sm font-bold mb-2">{{ __('Apellido materno') }}</label>
                  <input id="apellidoM" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('apellidoM') border-red-500 @enderror" name="apellidoM" value="{{ old('apellidoM') }}" required autocomplete="apellidoM" autofocus>
      
                  @error('apellidoM')
                    <span class="text-red-500 text-sm" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
      
                <!-- Email -->
                <div class="mb-4">
                  <label for="email" class="block text-sm font-bold mb-2">{{ __('Correo') }}</label>
                  <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
      
                  @error('email')
                    <span class="text-red-500 text-sm" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
      
                <!-- Contraseña -->
                <div class="mb-4">
                  <label for="password" class="block text-sm font-bold mb-2">{{ __('Contraseña') }}</label>
                  <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">
      
                  @error('password')
                    <span class="text-red-500 text-sm" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
      
                <!-- Confirmar Contraseña -->
                <div class="mb-4">
                  <label for="password-confirm" class="block text-sm font-bold mb-2">{{ __('Confirmar Contraseña') }}</label>
                  <input id="password-confirm" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password_confirmation" required autocomplete="new-password">
                </div>
      
                <div class="mb-4">
                  <label for="role_id">Seleccionar Rol</label>
                  <select name="role_id" id="role_id" class="block w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="" disabled selected>Seleccione un rol</option>
                    @foreach ($roles as $role)
                      <option value="{{ $role->id }}">{{ $role->nombre }}</option> 
                    @endforeach
                  </select>
                  @error('role_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                  @enderror
                </div>
      
                <div class="flex justify-center">
                  <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Registrar</button>
                </div>
                </form>
            </div>
          </div>
        </div>
    </div>
@endsection
