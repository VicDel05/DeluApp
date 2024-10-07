
{{-- <nav class="bg-cyan-900 shadow-md p-4 text-white">
  <div class="container mx-auto flex justify-between items-center">
      @if (Auth::check() && Auth::user()->role_id == '1')
          <a class="text-lg font-bold" href="{{ url('/dashboard') }}">
              <img src="{{ asset('img/Delu24-wbg.png') }}" class="w-28" alt="logo" draggable="false">
          </a>
      @else
          <a class="text-lg font-bold" href="{{ url('/staff') }}">
              <img src="{{ asset('img/Delu24-wbg.png') }}" class="w-28" alt="logo" draggable="false">
          </a>
      @endif

      <!-- Botón hamburguesa para dispositivos móviles -->
      <div class="lg:hidden">
          <button class="focus:outline-none" id="nav-toggle">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
              </svg>
          </button>
      </div>

      <!-- Menú de navegación -->
      <div class="hidden lg:flex space-x-4 items-center" id="nav-content">
          @if (Auth::check() && Auth::user()->role_id == '1')
              <ul class="lg:flex lg:space-x-6">
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('users.index') }}">Usuarios</a>
                  </li>
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('categories.index') }}">Categorías</a>
                  </li>
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('products.index') }}">Productos</a>
                  </li>
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('sales.index') }}">Ventas</a>
                  </li>
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('reports.index') }}">Reportes</a>
                  </li>
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('acount') }}">Perfil</a>
                  </li>
                  <li>
                      <form action="{{ route('logout') }}" method="post">
                          @csrf
                          <button type="submit" class="flex items-center text-lg hover:text-blue-500">Cerrar sesión</button>
                      </form>
                  </li>
              </ul>
          @else
              <ul class="lg:flex lg:space-x-6">
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('products') }}">
                          Productos
                      </a>
                  </li>
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('sales.index') }}">
                          Ventas
                      </a>
                  </li>
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('acount') }}">
                          Perfil
                      </a>
                  </li>
                  <li>
                      <form action="{{ route('logout') }}" method="post">
                          @csrf
                          <button type="submit" class="flex items-center text-lg hover:text-blue-500">
                              Cerrar sesión
                          </button>
                      </form>
                  </li>
              </ul>
          @endif
      </div>
  </div>
</nav> --}}

<!-- Navbar -->
<nav class="bg-cyan-900 shadow-md fixed w-full z-10 text-white">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        @if (Auth::check() && Auth::user()->role_id == '1')
            <a class="text-lg font-bold" href="{{ url('/dashboard') }}">
                <img src="{{ asset('img/Delu24-wbg.png') }}" class="w-28" alt="logo" draggable="false">
            </a>
        @else
            <a class="text-lg font-bold" href="{{ url('/staff') }}">
                <img src="{{ asset('img/Delu24-wbg.png') }}" class="w-28" alt="logo" draggable="false">
            </a>
        @endif
      
      <!-- Menu items (hidden on small screens) -->
      <div class="hidden md:flex space-x-8">
        @if (Auth::check() && Auth::user()->role_id == '1')
              <ul class="lg:flex lg:space-x-6">
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('users.index') }}">Usuarios</a>
                  </li>
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('categories.index') }}">Categorías</a>
                  </li>
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('products.index') }}">Productos</a>
                  </li>
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('sales.index') }}">Ventas</a>
                  </li>
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('reports.index') }}">Reportes</a>
                  </li>
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('acount') }}">Perfil</a>
                  </li>
                  <li>
                      <form action="{{ route('logout') }}" method="post">
                          @csrf
                          <button type="submit" class="flex items-center text-lg hover:text-blue-500">Cerrar sesión</button>
                      </form>
                  </li>
              </ul>
        @else
              <ul class="lg:flex lg:space-x-6">
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('products') }}">
                          Productos
                      </a>
                  </li>
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('sales.index') }}">
                          Ventas
                      </a>
                  </li>
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('acount') }}">
                          Perfil
                      </a>
                  </li>
                  <li>
                      <form action="{{ route('logout') }}" method="post">
                          @csrf
                          <button type="submit" class="flex items-center text-lg hover:text-blue-500">
                              Cerrar sesión
                          </button>
                      </form>
                  </li>
              </ul>
        @endif
      </div>
  
      <!-- Button for mobile menu -->
      <button class="block md:hidden text-white focus:outline-none" id="navbar-toggle">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
      </button>
    </div>
  
    <!-- Mobile menu (hidden by default) -->
    <div class="hidden ml-6 my-4" id="navbar-menu">
        @if (Auth::check() && Auth::user()->role_id == '1')
              <ul class="lg:flex lg:space-x-6 text-white">
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('users.index') }}">Usuarios</a>
                  </li>
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('categories.index') }}">Categorías</a>
                  </li>
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('products.index') }}">Productos</a>
                  </li>
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('sales.index') }}">Ventas</a>
                  </li>
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('reports.index') }}">Reportes</a>
                  </li>
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('acount') }}">Perfil</a>
                  </li>
                  <li>
                      <form action="{{ route('logout') }}" method="post">
                          @csrf
                          <button type="submit" class="flex items-center text-lg hover:text-blue-500">Cerrar sesión</button>
                      </form>
                  </li>
              </ul>
        @else
              <ul class="lg:flex lg:space-x-6">
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('products') }}">
                          Productos
                      </a>
                  </li>
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('sales.index') }}">
                          Ventas
                      </a>
                  </li>
                  <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('acount') }}">
                          Perfil
                      </a>
                  </li>
                  <li>
                      <form action="{{ route('logout') }}" method="post">
                          @csrf
                          <button type="submit" class="flex items-center text-lg hover:text-blue-500">
                              Cerrar sesión
                          </button>
                      </form>
                  </li>
              </ul>
        @endif
    </div>
</nav>
  
  <!-- Spacing for content under the navbar -->
  <div class="pt-16"></div>
  
  <script>
    const toggleButton = document.getElementById('navbar-toggle');
    const menu = document.getElementById('navbar-menu');
  
    toggleButton.addEventListener('click', function() {
      menu.classList.toggle('hidden');
    });
  </script>
  