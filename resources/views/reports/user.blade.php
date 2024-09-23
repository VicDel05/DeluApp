@extends('layouts.app')

@section('title', 'Reporte de usuarios')

@section('content')
<div class="container mx-auto p-4" id="userReport">
    <h1 class="text-3xl font-bold mb-4">Reporte de Usuarios</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="p-4 bg-white shadow rounded-lg">
            <h2 class="text-xl font-semibold">Total de Usuarios</h2>
            <p class="text-2xl">{{ $totalUsers }}</p>
        </div>

        <div class="p-4 bg-white shadow rounded-lg">
            <h2 class="text-xl font-semibold">Usuarios administradores</h2>
            <p class="text-2xl">{{ $adminUsers->count() }}</p>
        </div>

        <div class="p-4 bg-white shadow rounded-lg">
            <h2 class="text-xl font-semibold">Empleados</h2>
            <p class="text-2xl">{{ $staffUsers->count() }}</p>
        </div>

    </div>

    <h2 class="text-2xl font-bold mt-6">Administradores</h2>
    <table class="w-full table-auto bg-white shadow rounded-lg mt-4">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($adminUsers as $adminUser)
                <tr>
                    <td class="border px-4 py-2">{{ $adminUser->id }}</td>
                    <td class="border px-4 py-2">{{ $adminUser->nombre }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="text-2xl font-bold mt-6">Empleados</h2>
    <table class="w-full table-auto bg-white shadow rounded-lg mt-4">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staffUsers as $staffUser)
                <tr>
                    <td class="border px-4 py-2">{{ $staffUser->id }}</td>
                    <td class="border px-4 py-2">{{ $staffUser->nombre }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex justify-center mt-5">
        <button onclick="printSection()" class="bg-slate-500 hover:bg-slate-700 text-white font-bold py-2 px-6 rounded-lg shadow-lg transition duration-200">
            Descargar reporte
        </button>
    </div>
</div>

<script>
    function printSection() {
        var printContent = document.getElementById('userReport').outerHTML;
        var originalContent = document.body.outerHTML;
      
        document.body.outerHTML = printContent;
        window.print();
        document.body.outerHTML = originalContent;
    }
</script>
@endsection