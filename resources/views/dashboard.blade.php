@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    {{-- <div class="container mt-5">
        <h1>Bienvenido al Dashboard, {{ Auth::user()->nombre }} {{ Auth::user()->apellidoP }}</h1>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Cerrar sesión</button>
        </form>

        <div class="container mt-5">
            <div class="row justify-content-center">
              <div class="col-md-4">
                <div class="card text-center">
                  <div class="card-body bg-info-subtle">
                    <h5 class="card-title">Usuarios</h5>
                    <a href="/register" class="btn btn-primary">Ir</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card text-center">
                  <div class="card-body bg-info-subtle">
                    <h5 class="card-title">Categorías</h5>
                    <a href="#" class="btn btn-primary">Ir</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card text-center">
                  <div class="card-body bg-info-subtle">
                    <h5 class="card-title">Productos</h5>
                    <a href="#" class="btn btn-primary">Ir</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row justify-content-center mt-4">
              <div class="col-md-4">
                <div class="card text-center">
                  <div class="card-body bg-info-subtle">
                    <h5 class="card-title">Ventas</h5>
                    <a href="#" class="btn btn-primary">Ir</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card text-center">
                  <div class="card-body bg-info-subtle">
                    <h5 class="card-title">Reportes</h5>
                    <a href="#" class="btn btn-primary">Ir</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card text-center">
                  <div class="card-body bg-info-subtle">
                    <h5 class="card-title">Perfil</h5>
                    <a href="/acount" class="btn btn-primary">Ir</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div> --}}

    <div class="container mt-5">
        <h1 class="text-3xl font-bold mb-4">Bienvenido al Dashboard, {{ Auth::user()->nombre }} {{ Auth::user()->apellidoP }}</h1>
      
        {{-- <form action="{{ route('logout') }}" method="POST" class="mb-5">
          @csrf
          <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Cerrar sesión</button>
        </form> --}}
      
        <div class="container mt-5">
          <div class="flex justify-center flex-wrap">
            <div class="w-full md:w-1/3 xl:w-1/3 p-4">
              <div class="bg-blue-100 rounded shadow-md p-4 text-center">
                <h5 class="text-lg font-bold mb-2">Usuarios</h5>
                <a href="/register" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ir</a>
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
