<nav class="bg-black text-white py-4">
    <div class="container mx-auto flex items-center justify-between">
        <a href="/" class="text-xl font-bold">Mi Proyecto</a>

        <div class="hidden md:flex space-x-6">
            <a href="{{ route('Inicio') }}" class="hover:text-gray-300">Inicio</a>
            <a href="{{ route('Agregar') }}" class="hover:text-gray-300">Agregar</a>
            <!-- <a href="{{ route('Editar') }}" class="hover:text-gray-300">Editar</a> -->
            <a href="{{ route('Listado') }}" class="hover:text-gray-300">Listado</a>
        </div>
    </div>
</nav>