@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-gray-100">
    {{-- Sidebar vertical --}}
    <aside class="w-72 bg-gray-800 text-white flex flex-col">
        <div class="p-6 text-2xl font-bold border-b border-gray-700">
            Panel Administrador
        </div>

        <nav class="flex-1 p-4 space-y-3">
            <a href="{{ route('admin.dashboard', ['section' => 'stats']) }}"
               class="block px-4 py-2 rounded-lg hover:bg-gray-700 {{ request('section') === 'stats' || request('section') === null ? 'bg-blue-800' : '' }}">
                📊 Estadísticas
            </a>
            <a href="{{ route('admin.dashboard', ['section' => 'create']) }}"
               class="block px-4 py-2 rounded-lg hover:bg-gray-700 {{ request('section') === 'create' ? 'bg-blue-800' : '' }}">
                ➕ Crear Examen
            </a>
            <a href="{{ route('admin.dashboard', ['section' => 'admins']) }}"
               class="block px-4 py-2 rounded-lg hover:bg-gray-700 {{ request('section') === 'admins' ? 'bg-blue-800' : '' }}">
                👤 Administradores
            </a>
        </nav>
    </aside>

    {{-- Contenido dinámico --}}
    <main class="flex-1 p-8">
        @if(request('section') === 'create')
            <h1 class="text-3xl font-bold mb-6">➕ Crear Examen</h1>
            <div class="bg-white p-6 rounded shadow">
                <form action="#" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block font-semibold">Título del examen</label>
                        <input type="text" name="title" class="w-full border rounded px-3 py-2 mt-2"
                               placeholder="Ej: Matemáticas Básicas">
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">Descripción</label>
                        <textarea name="description" class="w-full border rounded px-3 py-2 mt-2" rows="3"
                                  placeholder="Descripción breve del examen"></textarea>
                    </div>

                    <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Guardar Examen
                    </button>
                </form>
            </div>

        @elseif(request('section') === 'admins')
            <h1 class="text-3xl font-bold mb-6">👤 Administradores</h1>
            <div class="bg-white p-6 rounded shadow">
                <p class="mb-4 text-gray-700">Lista de administradores actuales:</p>

                <ul class="list-disc ml-6 mb-4 text-gray-800">
                    <li>admin1@ejemplo.com</li>
                    <li>admin2@ejemplo.com</li>
                </ul>

                <a href="{{ route('admin.add') }}"
                   class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                    ➕ Agregar Administrador
                </a>
            </div>

        @else
            <h1 class="text-3xl font-bold mb-6">📊 Estadísticas</h1>
            <div class="grid grid-cols-3 gap-6">
                <div class="p-6 bg-white rounded shadow">
                    <h2 class="text-xl font-bold">Usuarios</h2>
                    <p class="text-2xl">{{ $users ?? 0 }}</p>
                </div>
                <div class="p-6 bg-white rounded shadow">
                    <h2 class="text-xl font-bold">Exámenes realizados</h2>
                    <p class="text-2xl">{{ $exams ?? 0 }}</p>
                </div>
                <div class="p-6 bg-white rounded shadow">
                    <h2 class="text-xl font-bold">Promedio de puntaje</h2>
                    <p class="text-2xl">{{ isset($average) ? round($average, 2) : 0 }}</p>
                </div>
            </div>
        @endif
    </main>
</div>
@endsection

