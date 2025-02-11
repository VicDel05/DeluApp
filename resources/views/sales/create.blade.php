@extends('layouts.app')

@section('title', 'Registrar venta')

@section('content')
<div class="container mx-auto p-4 pt-10 md:p-6 lg:p-12">
    <h1 class="text-4xl font-extrabold text-gray-800 text-center mb-6 animate-fade-in">Registrar venta</h1>
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 shadow-md">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('sales.store') }}">
        @csrf
        <div class="mb-3 animate-slide-in">
            <label for="users_id" class="block mb-2 text-sm font-bold text-gray-700">Usuario</label>
            <p class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow">{{ Auth::user()->nombre }}</p>
            <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
            <input type="hidden" id="fecha_venta" name="fecha_venta" value="">
        </div>

        <!-- Selección de productos -->
        <p class="block text-gray-700 text-sm font-bold mb-2 animate-slide-in">Seleccionar Producto(s):</p>
        <table class="min-w-full table-auto bg-white shadow-md rounded-lg overflow-hidden mt-5 mb-3 animate-slide-in">
            <thead>
                <tr class="bg-cyan-700 text-white text-left uppercase text-sm font-semibold">
                    <th class="py-3 px-6">Producto</th>
                    <th class="py-3 px-6">Precio</th>
                    <th class="py-3 px-6">Cantidad</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                @foreach($products as $product)
                    @if($product->stock > 0) <!-- Solo mostrar productos con stock disponible -->
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-6">{{ $product->nombre }}</td>
                            <td class="py-3 px-6">$<span class="precio">{{ $product->precio }}</span></td>
                            <td class="py-3 px-6">
                                <input type="hidden" name="products[{{ $product->id }}][id]" value="{{ $product->id }}">
                                <input type="hidden" name="products[{{ $product->id }}][precio]" value="{{ $product->precio }}">
                                <input type="number" name="products[{{ $product->id }}][cantidad]" value="0" min="0" max="{{ $product->stock }}" class="cantidad shadow border rounded w-full py-2 px-3 text-gray-700">
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <!-- Subtotal y pago -->
        <div class="flex justify-around gap-5 animate-slide-in">
            <div class="w-1/2 mb-3">
                <label class="block text-sm font-bold text-gray-700">Subtotal</label>
                <input type="text" id="subtotal" class="w-full px-3 py-2 text-sm text-gray-700 border rounded shadow bg-gray-100" readonly>
            </div>

            <div class="w-1/2 mb-3">
                <label class="block text-sm font-bold text-gray-700">Pago recibido</label>
                <input type="number" id="pago" class="w-full px-3 py-2 text-sm text-gray-700 border rounded shadow" placeholder="$0">
            </div>
        </div>

        <!-- Cambio -->
        <div class="mb-3 animate-slide-in">
            <label class="block text-sm font-bold text-gray-700">Cambio</label>
            <input type="text" id="cambio" class="w-full px-3 py-2 text-sm text-gray-700 border rounded shadow bg-gray-100" readonly>
        </div>

        <button type="submit" class="bg-cyan-600 hover:bg-cyan-700 text-white font-bold py-3 px-5 rounded-lg shadow-md transition-transform transform hover:scale-105">Registrar venta</button>
    </form>
</div>
<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes slide-in {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-fade-in {
        animation: fade-in 0.6s ease-out;
    }

    .animate-slide-in {
        animation: slide-in 0.8s ease-in-out;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cantidades = document.querySelectorAll('.cantidad');
        const precios = document.querySelectorAll('.precio');
        const subtotalInput = document.getElementById('subtotal');
        const pagoInput = document.getElementById('pago');
        const cambioInput = document.getElementById('cambio');

        function calcularSubtotal() {
            let total = 0;
            cantidades.forEach((input, index) => {
                let cantidad = parseInt(input.value) || 0;
                let precio = parseFloat(precios[index].textContent) || 0;
                total += cantidad * precio;
            });
            subtotalInput.value = `$${total.toFixed(2)}`;
            calcularCambio();
        }

        function calcularCambio() {
            let subtotal = parseFloat(subtotalInput.value.replace('$', '')) || 0;
            let pago = parseFloat(pagoInput.value) || 0;
            let cambio = pago - subtotal;
            cambioInput.value = cambio >= 0 ? `$${cambio.toFixed(2)}` : '$0.00';
        }

        cantidades.forEach(input => input.addEventListener('input', calcularSubtotal));
        pagoInput.addEventListener('input', calcularCambio);
    });
</script>
@endsection

