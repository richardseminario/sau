<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Dashboard' }}</title>
    <style>
        /* Estilos para el menú hamburguesa */
        #menu-toggle:checked ~ #mobile-menu {
            display: block;
        }
        .hamburger-button {
            cursor: pointer;
            display: inline-block;
            padding: 0.5rem;
        }
    </style>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    @livewireStyles
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <!-- Navbar superior -->
    <header class="bg-gray-800 text-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-24">
            <x-mini-logo />
            <a href="">SED-SAU</a>
            <nav class="hidden md:flex space-x-4">
                <a href="{{ route('exams.index') }}" class="block w-full bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-center transition duration-200">Simulacion de Examen PSA</a>
                <a href="#" class="block w-full bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-center transition duration-200">Entrenamiento de Examen</a>
            </nav> 

            <div class="hidden md:flex items-center space-x-4">
                @auth
                    <!-- Botón de logout solo para usuarios autenticados -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded">
                            Cerrar sesión
                        </button>
                    </form>
                @endauth

                @guest
                    <!-- Si no está logueado -->
                    <div class="flex space-x-4">
                        <a href="{{ route('login') }}" class="bg-green-500 hover:bg-green-600 p-2 rounded">
                        Iniciar sesión
                    </a>
                    <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-600 p-2 rounded">
                        Registrarse
                    </a>
                    </div>   
                @endguest
            </div>

            <div class="md:hidden flex items-center">
                <label for="menu-toggle" class="hamburger-button">
                    <!-- Icono de hamburguesa SVG -->
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                        <path v-if="!open" fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                    </svg>
                </label>
            </div>
        </div>

        <input class="hidden" type="checkbox" id="menu-toggle">
            <div id="mobile-menu" class="hidden md:hidden bg-gray-700 pb-4 mt-2">
                <div class="px-2 pt-2 space-y-2">
                    <a href="{{ route('exams.index') }}" class="block w-full bg-blue-900 hover:bg-grey-700 text-white font-bold py-2 px-4 rounded text-center transition duration-200">Simulacion de Examen PSA</a>
                    <a href="#" class="block w-full bg-blue-900 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded text-center transition duration-200">Entrenamiento de Examen</a>
                     
                    <div class="pt-4 border-t border-gray-600">
                        @auth
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="block w-full text-left bg-red-500 hover:bg-red-600 px-4 py-2 rounded">
                                    Cerrar sesión
                                </button>
                            </form>
                        @endauth

                        @guest
                            <a href="{{ route('login') }}" class="block bg-green-500 hover:bg-green-600 p-2 rounded mb-2 text-center">
                                Iniciar sesión
                            </a>
                            <a href="{{ route('register') }}" class="block bg-blue-500 hover:bg-blue-600 p-2 rounded text-center">
                                Registrarse
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Contenido -->
    <main class="flex-1 p-6">
        {{ $slot ?? '' }}
    </main>

    <footer>
        <div class="bg-gray-800 text-white text-center p-4">
            &copy; {{ date('Y') }} SED-SAU. Todos los derechos reservados.
        </div>
    </footer>
    @livewireScripts
</body>
</html>
