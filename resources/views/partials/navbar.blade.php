{{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            </li>
        </ul>
    </div>
</nav> --}}

<nav class="bg-white py-4" id="nav-toggle">
    <div class="container mx-auto flex justify-between items-center">
      <a class="text-lg font-bold" href="{{ url('/') }}">Home</a>
      {{-- <button class="lg:hidden flex justify-center w-8 h-8 bg-gray-200 hover:bg-gray-400 rounded-full" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> --}}
      <button class="lg:hidden" id="nav-toggle">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
      <div class="hidden lg:block justify-end items-center" id="navbarNav">
        <ul class="flex justify-end items-center">
          <li class="nav-item">
            <a class="text-lg mx-4 hover:text-blue-500" href="{{ route('dashboard') }}">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="text-lg mx-4 hover:text-blue-500" href="{{ route('acount') }}">Profile</a>
          </li>
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="text-lg mx-4 hover:text-blue-500">Cerrar sesión</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  