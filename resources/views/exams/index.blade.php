<div>
    <h1>Examen PSA</h1>
   <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .categorias-sidebar {
            background: #2c3e50;
            padding: 20px;
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            overflow-y: auto;
            z-index: 1000;
        }

        .categorias-sidebar h3 {
            color: white;
            margin-bottom: 20px;
            text-align: center;
            font-size: 1.3em;
        }

        .categoria-btn {
            display: block;
            width: 100%;
            padding: 12px 15px;
            background: transparent;
            color: #ecf0f1;
            border: 1px solid #34495e;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 8px;
            text-align: left;
            transition: all 0.3s ease;
        }

        .categoria-btn:hover {
            background: #34495e;
            border-color: #667eea;
        }

        .categoria-btn.active {
            background: #667eea;
            border-color: #667eea;
            color: white;
        }

        /* Contenido principal */
        .main-wrapper {
            margin-left: 250px;
            flex: 1;
            min-height: 100vh;
            padding-top: 100px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            overflow: hidden;
            min-height: calc(100vh - 120px);
            padding-bottom: 0;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px 30px;
            position: fixed;
            top: 0;
            left: 250px;
            right: 0;
            z-index: 1000;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            height: auto;
            min-height: 100px;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .header-titles h1 {
            font-size: 2.2em;
            margin-bottom: 5px;
        }

        .header-titles p {
            opacity: 0.9;
            font-size: 1em;
        }

        .timer-container {
            background: rgba(255, 255, 255, 0.2);
            padding: 15px 20px;
            border-radius: 10px;
            text-align: center;
            backdrop-filter: blur(10px);
        }

        .timer-label {
            font-size: 0.9em;
            opacity: 0.8;
            margin-bottom: 5px;
        }

        .timer {
            font-size: 2em;
            font-weight: bold;
            font-family: 'Courier New', monospace;
        }

        .timer.warning {
            color: #ffc107;
            animation: pulse 1s infinite;
        }

        .timer.danger {
            color: #dc3545;
            animation: pulse 0.5s infinite;
        }

        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.7; }
            100% { opacity: 1; }
        }

        .header-buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .btn-primary {
            background: #28a745;
            color: white;
        }

        .btn-primary:hover {
            background: #218838;
            transform: translateY(-2px);
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background: #c82333;
            transform: translateY(-2px);
        }

        /* Contenido de preguntas */
        .main-content {
            padding: 30px;
            margin-top: 10px;
        }

        .pregunta-item {
            background: white;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
            transition: border-color 0.3s ease;
        }

        .pregunta-item:hover {
            border-color: #667eea;
        }

        .pregunta-header {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 20px;
        }

        .pregunta-numero {
            background: #667eea;
            color: white;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.9em;
            flex-shrink: 0;
        }

        .pregunta-texto {
            font-weight: 600;
            color: #2c3e50;
            font-size: 16px;
            line-height: 1.5;
            flex: 1;
        }

        .opciones-container {
            margin-left: 50px;
        }

        .opciones-texto {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }

        .opcion-texto-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 12px;
            background: #f8f9fa;
            border-radius: 6px;
            border: 1px solid #e9ecef;
        }

        .opcion-letra {
            background: #667eea;
            color: white;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.8em;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .opcion-contenido {
            flex: 1;
            color: #2c3e50;
            font-size: 15px;
            line-height: 1.4;
        }

        .inputs-container {
            display: flex;
            gap: 30px;
            align-items: center;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            border: 1px solid #e9ecef;
        }

        .input-group {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .input-label {
            font-weight: 600;
            color: #2c3e50;
            font-size: 14px;
        }

        .opcion-radio {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .no-data {
            text-align: center;
            padding: 60px 20px;
            color: #6c757d;
            font-style: italic;
            font-size: 1.1em;
        }

        .categoria-section {
            display: none;
        }

        .categoria-section.active {
            display: block;
        }

        /* Estilos para el radio button seleccionado */
        .input-group.selected .input-label {
            color: #28a745;
            font-weight: bold;
        }

        .input-group.selected .opcion-radio {
            accent-color: #28a745;
        }

        .seleccion-texto {
            margin-top: 10px;
            padding: 10px;
            background: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            color: #155724;
            font-weight: 500;
            display: none;
        }

        .seleccion-texto.mostrar {
            display: block;
        }

        /* Modal de confirmación */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 2000;
            align-items: center;
            justify-content: center;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            max-width: 400px;
            width: 90%;
        }

        .modal h3 {
            margin-bottom: 15px;
            color: #2c3e50;
        }

        .modal p {
            margin-bottom: 20px;
            color: #6c757d;
        }

        .modal-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .modal.hidden {
            display: none;
        }

        .examen-cerrado {
            text-align: center;
            padding: 60px 20px;
            color: #dc3545;
        }

        .examen-cerrado h2 {
            margin-bottom: 15px;
            font-size: 2em;
        }

        .correcta {
            color: #28a745;
            font-weight: bold;
        }

        .incorrecta {
            color: #dc3545;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .header {
                position: relative;
                padding: 15px;
                width: 100%;
                height: auto;
            }

            .container {
                min-height: auto;
                border-radius: 0;
                box-shadow: none;
            }

            body {
                flex-direction: column;
            }
            
            .categorias-sidebar {
                position: relative;
                left:0;
                width: 100%;
                height: auto;
            }
            
            .main-wrapper {
                margin-left: 0;
                padding-top: 0;
            }
            
            .main-content {
                margin-top: 0;
                padding: 15px;
            }
            
            .opciones-container {
                margin-left: 0;
            }
            
            .opciones-texto {
                grid-template-columns: 1fr;
            }
            
            .inputs-container {
                flex-wrap: wrap;
                gap: 15px;
            }
            
            .header-content {
                flex-direction: column;
                text-align: center;
            }
            
            .floating-timer {
                display: none;
            }

            .timer {
                font-size: 1.5em;
            }
        }

        .panel-resultados {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.9);
            width: 80%;
            max-width: 900px;
            max-height: 80vh;
            background: #ffffff;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
            z-index: 9999;
            overflow-y: auto;
            display: none;
            animation: aparecer 0.3s ease forwards;
        }

        .panel-resultados h3 {
            text-align: center;
            font-size: 26px;
            margin-bottom: 20px;
        }

        .panel-resultados h4 {
            margin-top: 20px;
            color: #2563eb;
            border-bottom: 2px solid #e5e7eb;
            padding-bottom: 5px;
        }

        .panel-resultados ul {
            list-style: none;
            padding: 0;
        }

        .panel-resultados li {
            font-size: 18px;
            padding: 8px 0;
        }

        .panel-resultados span {
            font-weight: bold;
            margin-left: 5px;
        }

        @keyframes aparecer {
            from {
                opacity: 0;
                transform: translate(-50%, -60%) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="categorias-sidebar">
        <h3>📚 Categorías</h3>
        @foreach($categoriasUnicas as $categoria)
            <button class="categoria-btn" onclick="mostrarCategoria('{{ $categoria }}')">
                {{ $categoria }}
            </button>
        @endforeach
    </div>

    <!-- Contenido principal -->
    
            <div class="header">
                <div class="header-content">
                    <div class="header-titles">
                        <h1>📝 Examen de Conocimientos</h1>
                        <p>
                            Postulante: <strong>{{ session('user_name') }}</strong> | 
                            Carrera: <strong>{{ session('user_career') }}</strong> |
                            Tiempo total: <strong id="tiempoTotal">
                                {{ floor(session('user_time') / 60) }}:{{ str_pad(session('user_time') % 60, 2, '0', STR_PAD_LEFT) }}
                            </strong> min
                        </p>
                    </div>
                     <div class="timer-container">
                        <div class="timer-label">Tiempo restante:</div>
                        <div class="timer" id="timer">
                            <!-- Se actualizará automáticamente con JavaScript -->
                            {{ floor($tiempoRestante / 60) }}:{{ str_pad($tiempoRestante % 60, 2, '0', STR_PAD_LEFT) }}
                        </div>
                    </div>
                    
                    <div class="header-buttons">
                        <button class="btn btn-primary" onclick="terminarExamen()">
                            ✅ Terminar Examen
                        </button>
                    </div>
                </div>
            </div>
    <div class="main-wrapper">
        <div class="container">
            <div class="main-content" id="mainContent">
                @foreach($preguntasPorCategoria as $categoriaData)
                    <div class="categoria-section" id="categoria-{{ Str::slug($categoriaData['categoria']) }}">
                        @foreach($categoriaData['preguntas'] as $index => $pregunta)
                            <div class="pregunta-item" data-id="{{ $pregunta['id_pregunta'] }}" id="pregunta-{{ $pregunta['id_pregunta'] }}">
                                <div class="pregunta-header">
                                    <div class="pregunta-numero">{{ $index + 1 }}</div>
                                    <!--<div class="pregunta-texto">{{ $pregunta['pregunta'] }}</div>-->
                                    @if($pregunta['es_imagen'])
                                        <span class="tipo-badge" style="font-size: 0.8em; background: #764ba2; color: white; padding: 2px 8px; border-radius:10px;">
                                            Pregunta con Imagen
                                        </span>
                                    @else
                                        {{ $pregunta['pregunta'] }}
                                    <span class="tipo-badge" style="font-size: 0.8em; background: #667eea; color: white; padding: 2px 8px; border-radius: 10px; margin-left: 10px;">
                                            Pregunta de Texto
                                        </span>
                                    @endif   
                                </div>
                                @if ($pregunta['es_imagen'] && !empty($pregunta['imagen_url']))
                                    <div class="imagen-pregunta" style="text-align: center; margin-bottom: 20px;">
                                        <img src="{{ $pregunta['imagen_url'] }}" alt="Imagen de la pregunta" style="max-width: 100%; height: auto; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                    </div>
                                @endif

                                @if(!$pregunta['es_imagen'] && !empty($pregunta['pregunta']))
                                    <div class="texto-pregunta" style="margin: 15px 0; padding: 15px; background: #f8f9fa; border-radius: 5px;">
                                        {{ $pregunta['pregunta'] }}
                                    </div>
                                @endif
                                
                                <div class="opciones-container">
                                    <div class="opciones-texto">
                                        @foreach($pregunta['opciones'] as $letra => $texto)
                                            @if(!empty($texto))
                                                <div class="opcion-texto-item">
                                                    <div class="opcion-letra">{{ $letra }}</div>
                                                    <div class="opcion-contenido">{{ $texto }}</div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    
                                    <div class="inputs-container">
                                        <div style="font-weight: 600; color: #2c3e50; margin-right: 15px;">
                                            Selecciona tu respuesta:
                                        </div>
                                        @foreach($pregunta['opciones'] as $letra => $texto)
                                            @if(!empty($texto))
                                                <div class="input-group" id="input-group-{{ $pregunta['id_pregunta'] }}-{{ $letra }}">
                                                    <input 
                                                        type="radio" 
                                                        class="opcion-radio" 
                                                        id="pregunta-{{ $pregunta['id_pregunta'] }}-{{ $letra }}"
                                                        name="pregunta_{{ $pregunta['id_pregunta'] }}" 
                                                        value="{{ $letra }}"
                                                        onchange="marcarOpcion(this)"
                                                    >
                                                    <label class="input-label" for="pregunta-{{ $pregunta['id_pregunta'] }}-{{ $letra }}">
                                                        {{ $letra }}
                                                    </label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    
                                    <div class="seleccion-texto" id="seleccion-{{ $pregunta['id_pregunta'] }}">
                                        Has seleccionado la opción: <strong id="opcion-seleccionada-{{ $pregunta['id_pregunta'] }}"></strong>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach

                <div class="no-data" id="noDataMessage">
                    Selecciona una categoría del menú lateral para comenzar
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación -->
    <div class="modal" id="confirmModal">
        <div class="modal-content">
            <h3>¿Terminar Examen?</h3>
            <p>¿Estás seguro de que deseas terminar el examen? Esta acción no se puede deshacer.</p>
            <div class="modal-buttons">
                <button class="btn btn-primary" onclick="confirmarTerminar()">Sí, Terminar</button>
                <button class="btn btn-danger" onclick="cerrarModal()">Cancelar</button>
            </div>
        </div>
    </div>

    <div id="panelResultados" class="panel-resultados"></div>

    <!-- Modal de tiempo agotado -->
    <div class="modal" id="timeoutModal">
        <div class="modal-content">
            <h3>⏰ Tiempo Agotado</h3>
            <p>El tiempo del examen ha finalizado. Se procederá a enviar tus respuestas automáticamente.</p>
            <div class="modal-buttons">
                <button class="btn btn-primary" onclick="enviarRespuestas()">Aceptar</button>
            </div>
        </div>
    </div>

    <script>
        let tiempoRestante = {{ $tiempoRestante }};
        let temporizador;
        let examenActivo = true;

        /* -------------------------------
        INICIO DE LA PÁGINA
        --------------------------------*/
        document.addEventListener('DOMContentLoaded', function() {
            console.log('📄 Página cargada');
            console.log('⏰ Tiempo restante:', tiempoRestante);

            if (tiempoRestante <= 0) {
                tiempoAgotado();
                return;
            }

            iniciarTemporizador();

            @if($categoriasUnicas->count() > 0)
                mostrarCategoria('{{ $categoriasUnicas->first() }}');
            @endif
        });

        /* -------------------------------
        TEMPORIZADOR
        --------------------------------*/
        function iniciarTemporizador() {
            actualizarTemporizador();

            temporizador = setInterval(() => {
                tiempoRestante--;
                actualizarTemporizador();

                if (tiempoRestante <= 0) {
                    tiempoAgotado();
                }
            }, 1000);
        }

        function actualizarTemporizador() {
            const minutos = Math.floor(tiempoRestante / 60);
            const segundos = tiempoRestante % 60;

            const timer = document.getElementById('timer');
            if (timer) {
                timer.textContent = 
                    minutos.toString().padStart(2, '0') + ":" +
                    segundos.toString().padStart(2, '0');

                timer.className =
                    tiempoRestante <= 300 ? "timer danger" :
                    tiempoRestante <= 600 ? "timer warning" :
                    "timer";
            }

            document.title = `(${timer.textContent}) - Examen`;
        }

        function tiempoAgotado() {
            console.log('⏰ Tiempo agotado!');
            clearInterval(temporizador);
            examenActivo = false;
            bloquearExamen();
            enviarRespuestasComoCadena();
            mostrarPanelResultados();
        }

        /* -------------------------------
        OBTENER RESPUESTAS
        --------------------------------*/
        function obtenerRespuestas() {
            let respuestas = [];

            document.querySelectorAll('.pregunta-item').forEach(p => {
                let id = p.dataset.id;

                let opcionSeleccionada = p.querySelector('input[type="radio"]:checked');

                if (opcionSeleccionada) {
                    respuestas.push({
                        id_pregunta: parseInt(id),
                        opcion: opcionSeleccionada.value
                    });
                }
            });

            console.log("📦 Total respuestas:", respuestas.length);
            return respuestas;
        }

        /* -------------------------------
        ENVIAR RESPUESTAS COMO CADENA
        --------------------------------*/
        function enviarRespuestasComoCadena() {
            let respuestas = obtenerRespuestas();
            let cadena = JSON.stringify(respuestas);

            console.log("📤 ENVIANDO CADENA:", cadena);

            fetch('/guardar-respuestas', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    respuestas: cadena
                })
            })
            .then(res => res.json())
            .then(data => {
                console.log("📥 RESPUESTA SERVIDOR:", data);
            })
            .catch(err => console.error("❌ ERROR fetch:", err));
        }

        /* -------------------------------
        MARCAR OPCIÓN
        --------------------------------*/
        function marcarOpcion(radio) {
            const preguntaId = radio.name.replace('pregunta_', "");

            document
                .querySelectorAll(`[id^="input-group-${preguntaId}-"]`)
                .forEach(g => g.classList.remove("selected"));

            radio.closest(".input-group").classList.add("selected");
        }

        /* -------------------------------
        CAMBIAR CATEGORÍA
        --------------------------------*/
        function mostrarCategoria(categoria) {
            // NUEVO: Ocultar mensaje "no data"
            const noDataMsg = document.getElementById('noDataMessage');
            if (noDataMsg) noDataMsg.style.display = 'none';
            
            // 1. Ocultar todas las categorías
            document.querySelectorAll('.categoria-section').forEach(section => {
                section.classList.remove('active');
            });
            
            // 2. Mostrar categoría seleccionada
            const categoriaId = 'categoria-' + categoria.toLowerCase().replace(/ /g, '-');
            const categoriaSection = document.getElementById(categoriaId);
            
            if (categoriaSection) {
                categoriaSection.classList.add('active');
            }
            
            // 3. Actualizar botón activo
            document.querySelectorAll('.categoria-btn').forEach(btn => {
                btn.classList.remove('active');
                if (btn.textContent.trim() === categoria) {
                    btn.classList.add('active');
                }
            });
        }
        /* -------------------------------
        BLOQUEAR EXAMEN
        --------------------------------*/
        function bloquearExamen() {
            examenActivo = false;

            document.querySelectorAll('.opcion-radio').forEach(r => r.disabled = true);
            document.querySelectorAll('.categoria-btn, .btn-primary').forEach(btn => {
                btn.disabled = true;
                btn.style.opacity = "0.5";
                btn.style.cursor = "not-allowed";
            });

            document.title = "Examen Finalizado";
        }

        function terminarExamen() {
            if (!examenActivo) return;
            const modal = document.getElementById('confirmModal');
            if (modal) modal.classList.add('show');
        }

        function cerrarModal() {
            document.getElementById('confirmModal')?.classList.remove('show');
            document.getElementById('timeoutModal')?.classList.remove('show');
        }

        /* -------------------------------
        CONFIRMAR TERMINAR
        --------------------------------*/
        function confirmarTerminar() {
            cerrarModal();
            clearInterval(temporizador);
            bloquearExamen();
            examenActivo = false;
            enviarRespuestasComoCadena();
            mostrarPanelResultados();
        }

        function mostrarPanelResultados() {
            const panel = document.getElementById('panelResultados');
            if (!panel) return;

            let html = "<h3>🧾 Resultados</h3>";

            // Recorremos categorías visibles
            document.querySelectorAll('.categoria-section').forEach(categoriaSection => {

                const categoriaId = categoriaSection.id.replace('categoria-', '');
                const categoriaNombre = categoriaId.replace(/-/g, ' ').toUpperCase();

                let contenidoCategoria = "";

                categoriaSection.querySelectorAll('.pregunta-item').forEach(pregunta => {

                    const numero = pregunta.querySelector('.pregunta-numero')?.textContent;
                    const seleccionada = pregunta.querySelector('input[type="radio"]:checked');

                    if (seleccionada) {
                        contenidoCategoria += `
                            <li>
                                <b>Pregunta ${numero}:</b> 
                                <span style="color:green">${seleccionada.value}</span>
                            </li>
                        `;
                    }
                });

                if (contenidoCategoria !== "") {
                    html += `
                        <h4>📘 ${categoriaNombre}</h4>
                        <ul>${contenidoCategoria}</ul>
                    `;
                }
            });

            html += `<p style="margin-top:10px">⏳ Este resumen desaparecerá en 30 segundos...</p>`;

            panel.innerHTML = html;
            panel.style.display = 'block';

            setTimeout(() => {
                panel.style.display = 'none';
            }, 30000);
        }
    </script>
</div>

