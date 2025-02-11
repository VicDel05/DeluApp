@extends('layouts.app')

@section('title', 'Perfil')

@section('content')
<div class="container mx-auto p-6 pt-10 md:p-8 lg:p-12">
    <h1 class="text-4xl font-extrabold text-gray-800 text-center mb-8 animate-fade-in">Mi Perfil</h1>

    <div class="flex flex-col md:flex-row items-center md:items-start md:space-x-10">
        <!-- Tarjeta de Usuario -->
        <div class="bg-white shadow-lg rounded-xl p-6 w-full md:w-1/3 text-center border border-gray-200 animate-slide-in">
            <div class="flex justify-center">
                <img src="img/gente.png" class="w-40 h-40 rounded-full border-4 border-cyan-600 shadow-md" alt="user-img" draggable="false">
            </div>
            <h2 class="text-xl font-semibold text-gray-800 mt-4">{{ Auth::user()->nombre }} {{ Auth::user()->apellidoP }} {{ Auth::user()->apellidoM }}</h2>
            <p class="text-gray-500">{{ Auth::user()->role->nombre }}</p>
        </div>

        <!-- Información del usuario -->
        <div class="bg-cyan-700 text-white shadow-lg rounded-xl p-6 w-full md:w-2/3 border border-cyan-500 animate-slide-in">
            <h3 class="text-2xl font-semibold mb-4">Información Personal</h3>
            <ul class="text-lg space-y-4">
                <li class="flex items-center">
                    <span class="text-cyan-200 w-1/3">Correo:</span>
                    <span class="w-2/3">{{ Auth::user()->email }}</span>
                </li>
                <li class="flex items-center">
                    <span class="text-cyan-200 w-1/3">Rol:</span>
                    <span class="w-2/3">{{ Auth::user()->role->nombre }}</span>
                </li>
                <li class="flex items-center">
                    <span class="text-cyan-200 w-1/3">Registrado el:</span>
                    <span class="w-2/3">{{ Auth::user()->created_at->format('d M Y') }}</span>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Animaciones personalizadas -->
<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes slide-in {
        from { opacity: 0; transform: translateX(-15px); }
        to { opacity: 1; transform: translateX(0); }
    }

    .animate-fade-in {
        animation: fade-in 0.6s ease-out;
    }

    .animate-slide-in {
        animation: slide-in 0.8s ease-in-out;
    }
</style>
@endsection
