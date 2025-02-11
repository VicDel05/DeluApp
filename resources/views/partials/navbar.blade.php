
<button id="menu-toggle" class="md:hidden fixed top-4 left-4 z-50 text-white bg-cyan-900 p-2 rounded">
    ☰
</button>
<div id="sidebar" class="bg-cyan-900 h-screen w-64 fixed top-0 left-0 shadow-md text-white flex flex-col p-4 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
    <!-- Logo -->
    <div class="mb-6 flex justify-center">
        <a href="{{ Auth::check() && Auth::user()->role_id == '1' ? url('/dashboard') : url('/staff') }}">
            <img src="{{ asset('img/Delu24-wbg.png') }}" class="w-28" alt="logo" draggable="false">
        </a>
    </div>
        
    <!-- Menu Items -->
    <nav class="flex flex-col space-y-4">
        @if (Auth::check() && Auth::user()->role_id == '1')
            <a class="flex items-center text-lg hover:text-blue-300" href="{{ route('users.index') }}">Usuarios</a>
            <a class="flex items-center text-lg hover:text-blue-300" href="{{ route('categories.index') }}">Categorías</a>
            <a class="flex items-center text-lg hover:text-blue-300" href="{{ route('products.index') }}">Productos</a>
            <a class="flex items-center text-lg hover:text-blue-300" href="{{ route('sales.index') }}">Ventas</a>
            <a class="flex items-center text-lg hover:text-blue-300" href="{{ route('reports.index') }}">Reportes</a>
            <a class="flex items-center text-lg hover:text-blue-300" href="{{ route('acount') }}">Perfil</a>
        @else
            <a class="flex items-center text-lg hover:text-blue-300" href="{{ route('products') }}">Productos</a>
            <a class="flex items-center text-lg hover:text-blue-300" href="{{ route('sales.create') }}">Ventas</a>
            <a class="flex items-center text-lg hover:text-blue-300" href="{{ route('acount') }}">Perfil</a>
        @endif
            
        <!-- Logout -->
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="flex items-center text-lg hover:text-red-400">Cerrar sesión</button>
        </form>
    </nav>
</div>

  <!-- Script para manejar el menú en móviles -->
<script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
        let sidebar = document.getElementById('sidebar');
        if (sidebar.classList.contains('-translate-x-full')) {
            sidebar.classList.remove('-translate-x-full');
        } else {
            sidebar.classList.add('-translate-x-full');
        }
    });
</script>
  