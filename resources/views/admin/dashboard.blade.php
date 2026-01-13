<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">

    {{-- Sidebar vertical --}}
    <aside class="w-72 bg-gray-800 text-white flex flex-col">
        <div class="p-6 text-2xl font-bold border-b border-gray-700">
            Panel Administrador
        </div>

        <nav class="flex-1 p-4 space-y-3">
            {{-- Cargar Preguntas --}}
            <a href="{{ route('admin.dashboard', ['section' => 'create']) }}"
               class="block px-4 py-2 rounded-lg hover:bg-gray-700
               {{ request('section') === 'create' ? 'bg-blue-800' : '' }}">
                ➕ Cargar Preguntas
            </a>

            {{-- Iniciar Torneos --}}
            <a href="{{ route('admin.dashboard', ['section' => 'tournaments']) }}"
               class="block px-4 py-2 rounded-lg hover:bg-gray-700
               {{ request('section') === 'tournaments' ? 'bg-blue-800' : '' }}">
                🏆 Iniciar Torneos
            </a>

            {{-- Ver Resultados --}}
            <a href="{{ route('admin.dashboard', ['section' => 'results']) }}"
               class="block px-4 py-2 rounded-lg hover:bg-gray-700
               {{ request('section') === 'results' ? 'bg-blue-800' : '' }}">
                📄 Ver Resultados
            </a>

            {{-- Agregar Director --}}
            <a href="{{ route('admin.dashboard', ['section' => 'roles']) }}"
               class="block px-4 py-2 rounded-lg hover:bg-gray-700
               {{ request('section') === 'roles' ? 'bg-blue-800' : '' }}">
                👤 Agregar Directores
            </a>
        </nav>
    </aside>

    {{-- Contenido dinámico --}}
    <main class="flex-1 p-8">

        {{-- Cargar Preguntas --}}
        @if(request('section') === 'create')
            <h1 class="text-3xl font-bold mb-6">➕ Cargar Preguntas</h1>

            <div class="bg-white p-6 rounded shadow">
                <form method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block font-semibold">Pregunta</label>
                        <input type="text" class="w-full border rounded px-3 py-2 mt-2"
                               placeholder="Qué es la capital de Francia?">
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">Opciones</label>
                        <input type="text" class="w-full border rounded px-3 py-2 mt-2 mb-2"
                               placeholder="Berlín">
                        <input type="text" class="w-full border rounded px-3 py-2 mb-2"
                               placeholder="Madrid">
                        <input type="text" class="w-full border rounded px-3 py-2 mb-2"
                               placeholder="París">
                        <input type="text" class="w-full border rounded px-3 py-2"
                               placeholder="Roma">

                        <label for="respuesta_correcta" class="block font-semibold mt-4">Respuesta Correcta</label>
                        <input type="text" id="respuesta_correcta" name="respuesta_correcta"
                               class="w-full border rounded px-3 py-2 mt-2"
                               placeholder="Introduce la respuesta correcta (Ej: Paris)">
                    </div>

                    <button type="submit"
                        class="bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Guardar Pregunta
                    </button>

                    <p class="text-sm text-gray-600 mb-2 pt-6">Sube un archivo con el formato de preguntas para importarlas.</p>
                
                    <input type="file" id="archivo_importacion" name="archivo_importacion" 
                            class="w-full border rounded px-3 py-2 mt-2"
                            accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                    
                    <button type="button" id="boton_importar"
                            class="w-full bg-blue-900 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4">
                            Importar Preguntas
                    </button>
                </form>
            </div>

        {{-- Iniciar Torneos --}}
        @elseif(request('section') === 'tournaments')
            <h1 class="text-3xl font-bold mb-6">🏆 Iniciar Torneos</h1> 

            <div class="bg-white p-6 rounded shadow">
                <p class="text-gray-700">Aquí podrás crear y administrar torneos de exámenes.</p>
            </div>

        {{-- Ver Resultados --}}
        @elseif(request('section') === 'results')
            <h1 class="text-3xl font-bold mb-6">📄 Resultados de Exámenes</h1>

            <div class="bg-white p-6 rounded shadow">
                <p class="text-gray-700">Aquí se mostrarán los resultados de los usuarios.</p>
            </div>

        {{-- Agregar Directores --}}
        @elseif(request('section') === 'roles')
            <h1 class="text-3xl font-bold mb-6">👤 Agregar Directores</h1>

            <div class="bg-white p-6 rounded shadow">
                <p class="mb-4 text-gray-700">Administradores actuales:</p>

                <a href="#"
                   class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                    ➕ Agregar Director
                </a>
            </div>

        @else
            <h1 class="text-3xl font-bold mb-6">📊 Selecciona una opción del menú</h1>
        @endif

    </main>
</div>
</x-app-layout>
