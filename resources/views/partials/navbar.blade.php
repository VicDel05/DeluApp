
{{-- <nav class="bg-white p-4">
    <div class="container mx-auto flex justify-between items-center">
      @if (Auth::check() && Auth::user()->role_id == '1')
        <a class="text-lg font-bold" href="{{ url('/dashboard') }}"><img src="img/Delu24-wbg.png" class="w-28" alt="logo"></a>
      @else
        <a class="text-lg font-bold" href="{{ url('/staff') }}"><img src="img/Delu24-wbg.png" class="w-28" alt="logo"></a>
      @endif
      <div class="block lg:hidden">
        <button class="focus:outline-none" id="nav-toggle">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>
      </div>
      
      <div class=" hidden lg:block lg:w-auto" id="nav-content">
        @if (Auth::check() && Auth::user()->role_id == '1')
          <ul class="lg:flex lg:space-x-4">
            <li class="">
              <a class="text-lg hover:text-blue-500" href="{{ route('users.index') }}">Usuarios</a>
            </li>
            <li class="">
              <a class="text-lg hover:text-blue-500" href="{{ route('categories.index') }}">Categorías</a>
            </li>
            <li class="">
              <a class="text-lg hover:text-blue-500" href="{{ route('products.index') }}">Productos</a>
            </li>
            <li class="">
              <a class="text-lg hover:text-blue-500" href="{{ route('sales.index') }}">Ventas</a>
            </li>
            <li class="">
              <a class="text-lg hover:text-blue-500" href="#">Reportes</a>
            </li>
            <li class="">
              <a class="text-lg hover:text-blue-500" href="{{ route('acount') }}">Perfil</a>
            </li>
            <li class="">
              <form action="{{ route('logout') }}" method="post">
                  @csrf
                  <button type="submit" class="text-lg hover:text-blue-500">Cerrar sesión</button>
              </form>
            </li>
          </ul>
        @else
        <ul class="lg:flex lg:space-x-4">
          <li class="">
            <a class="text-lg hover:text-blue-500" href="#">Productos</a>
          </li>
          <li class="">
            <a class="text-lg hover:text-blue-500" href="{{ route('sales.index') }}">Ventas</a>
          </li>
          <li class="">
            <a class="text-lg hover:text-blue-500" href="{{ route('acount') }}">Perfil</a>
          </li>
          <li class="">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="text-lg hover:text-blue-500">Cerrar sesión</button>
            </form>
          </li>
        </ul>
        @endif
      </div>
    </div>
</nav> --}}


<nav class="bg-cyan-900 shadow-md p-4 text-white">
  <div class="container mx-auto flex justify-between items-center">
      @if (Auth::check() && Auth::user()->role_id == '1')
          <a class="text-lg font-bold" href="{{ url('/dashboard') }}">
              <img src="img/Delu24-wbg.png" class="w-28" alt="logo" draggable="false">
          </a>
      @else
          <a class="text-lg font-bold" href="{{ url('/staff') }}">
              <img src="img/Delu24-wbg.png" class="w-28" alt="logo" draggable="false">
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
                  {{-- <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('sales.index') }}">Ventas</a>
                  </li> --}}
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
                      <a class="flex items-center text-lg hover:text-blue-500" href="#">
                          Productos
                      </a>
                  </li>
                  {{-- <li>
                      <a class="flex items-center text-lg hover:text-blue-500" href="{{ route('sales.index') }}">
                          Ventas
                      </a>
                  </li> --}}
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
</nav>

<!-- Script para el menú responsivo -->
{{-- <script>
  
</script> --}}
