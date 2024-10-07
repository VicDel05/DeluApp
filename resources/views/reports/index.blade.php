@extends('layouts.app')

@section('title', 'Reportes')

@section('content')

<div class="container mx-auto p-4 pt-10 md:p-6 lg:p-12">
    <h1 class="text-4xl font-bold mb-6 text-gray-800">Reportes</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <a href="{{ route('reports.stock') }}" id="stockReportBtn" class="bg-sky-600 hover:bg-sky-700 text-white font-bold py-10 px-10 rounded">Reporte de Stock</a>
        <a href="{{ route('reports.user') }}" id="salesReportBtn" class="bg-sky-600 hover:bg-sky-700 text-white font-bold py-10 px-10 rounded">Reporte de Usuarios</a>
        <a href="{{ route('reports.sale') }}" id="salesReportBtn" class="bg-sky-600 hover:bg-sky-700 text-white font-bold py-10 px-10 rounded">Reporte de Ventas</a>
        
    </div>
</div>
    
@endsection