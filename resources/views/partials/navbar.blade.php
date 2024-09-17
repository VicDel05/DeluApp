
<nav class="bg-white p-4">
    <div class="container mx-auto flex justify-between items-center">
      <a class="text-lg font-bold" href="{{ url('/dashboard') }}">Home</a>
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
              <a class="text-lg hover:text-blue-500" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="">
              <a class="text-lg hover:text-blue-500" href="{{ route('users.index') }}">Usuarios</a>
            </li>
            <li class="">
              <a class="text-lg hover:text-blue-500" href="{{ route('acount') }}">Profile</a>
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
            <a class="text-lg hover:text-blue-500" href="{{ route('login') }}">Productos</a>
          </li>
          <li class="">
            <a class="text-lg hover:text-blue-500" href="{{ route('acount') }}">Profile</a>
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
</nav>
