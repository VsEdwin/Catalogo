<nav class="bg-black text-white py-4">
    <div class="container mx-auto flex items-center justify-between">
        <a href="/" class="text-xl font-bold">Prime Video</a>

        @php
            $loggedIn = session()->has('usuario_id');
        @endphp

        <div class="hidden md:flex space-x-6 items-center">

            @if($loggedIn)
                <a href="{{ route('Inicio') }}" class="hover:text-gray-300">Inicio</a>
                <a href="{{ route('Agregar') }}" class="hover:text-gray-300">Agregar</a>
                <a href="{{ route('Listado') }}" class="hover:text-gray-300">Listado</a>
            @endif

            <a href="{{ route('Registro') }}" class="hover:text-gray-300">Registro</a>

            @if(! $loggedIn)
                <a href="{{ route('Login') }}" class="hover:text-gray-300">Login</a>
            @endif

            @if($loggedIn)
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                    </button>
                </form>
            @endif

        </div>
    </div>
</nav>
