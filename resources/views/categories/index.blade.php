@extends('layouts.app')

@section('title', 'Categorías')

@section('content')

<div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
    <h1 class="text-3xl font-bold mb-4">Categorías</h1>

    @if (session('success'))
        <div class="alert alert-success bg-green-100 border border-green-500 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3 bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">Crear categoría</a>

    <table class="table table-striped w-full mb-4">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Descripción</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $categorie)
                <tr>
                    <td class="px-4 py-2">{{ $categorie->id }}</td>
                    <td class="px-4 py-2">{{ $categorie->nombre }}</td>
                    <td class="px-4 py-2">{{ $categorie->descripcion }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('categories.edit', [($categorie->id)]) }}" class="btn btn-warning btn-sm bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 my-3 rounded">Editar</a>
                        <form action="{{ route('categories.delete', $categorie->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 my-3 rounded">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
