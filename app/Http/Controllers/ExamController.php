<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ExamController extends Controller
{
    public function categoria()
    {
        // Verificar que el usuario está autenticado
        if (!session('authenticated')) {
            return redirect()->route('login')->with('error', 'Debe iniciar sesión primero');
        }

        // Usar datos de la sesión
        $id_examen_postulante = session('user_id_post');
        $tiempoRestante = session('user_time'); // ✅ ESTE VIENE DE LA BD

        $preguntas = DB::select(
            'SELECT * FROM sau.f_lista_preguntas(?)', 
            [$id_examen_postulante]
        );
        
        $categoriasUnicas = collect($preguntas)
            ->pluck('r_tipo_grupo')
            ->unique()
            ->values();
        
        $preguntasPorCategoria = collect($preguntas)
            ->groupBy('r_tipo_grupo')
            ->map(function ($preguntasGrupo, $categoria) {
                return [
                    'categoria' => $categoria,
                    'preguntas' => $preguntasGrupo->map(function ($item) {
                        $contenidoPregunta = $item->r_pregunta ?? '';
                        $esImagen = false;
                        $imagenUrl = '';
                        $textoPregunta = '';

                        // Verificar si la pregunta es una imagen
                        if (preg_match('/\.(jpg|jpeg|png|gif|bmp|svg|webp)(\?.*)?$/i', $contenidoPregunta)) {
                            $esImagen = true;
                            $imagenUrl = $contenidoPregunta;
                            $textoPregunta = '';
                        }
                        elseif (preg_match('/<img<\s+[^>]*src=["\']([^"\']+)["\'][^>]*>/i', $contenidoPregunta, $matches)) {
                            $esImagen = true;
                            $imagenUrl = $matches[1];
                            $textoPregunta = strip_tags(str_replace($matches[0], '', $contenidoPregunta));
                        }
                        elseif (preg_match('/\/imagenes\/|\/img\/|\/graficos\//i', $contenidoPregunta)) {
                            $esImagen = true;
                            $imagenUrl = $contenidoPregunta;
                            $textoPregunta = '';
                        }
                        else {
                            $esImagen = false;
                            $textoPregunta = $contenidoPregunta;
                        }
                        return [
                            'id_pregunta' => $item->r_id_postulantes_preguntas ?? null,
                            'pregunta' => $textoPregunta,
                            'es_imagen' => $esImagen,
                            'imagen_url' => $esImagen ? $imagenUrl : null,
                            'contenido_original' => $contenidoPregunta,
                            'opciones' => [
                                'A' => $item->r_opcion1 ?? '',
                                'B' => $item->r_opcion2 ?? '',
                                'C' => $item->r_opcion3 ?? '',
                                'D' => $item->r_opcion4 ?? '',
                            ],
                            'id_pregunta' => $item->r_id_postulantes_preguntas ?? null,
                        ];
                    })->toArray()
                ];
            })
            ->values();

        return view('exams.index', compact(
            'preguntasPorCategoria', 
            'categoriasUnicas', 
            'tiempoRestante'
        ));
    }

    /* ✅ FUNCIÓN PARA CONVERTIR Y FORMATEAR RESPUESTAS
    private function formatearRespuestasParaPostgreSQL($respuestas)
    {
        $rows = [];
        
        foreach ($respuestas as $respuesta) {
            $id_pregunta = $respuesta['id_pregunta'];
            $letra = $respuesta['opcion_seleccionada'];
            
            // Formato: ROW(51,1)
            $rows[] = "ROW($id_pregunta, $letra)::sau.t_respuestas";
        }

        return implode(', ', $rows);
    }*/

    /* ✅ FUNCIÓN PARA CONVERTIR LETRA A NÚMERO

    public function guardarRespuestaIndividual(Request $request)
    {
    Log::info('🎯 === INICIO OPERACION BACKEND ===');
        $preguntas = $request->all();
        // 2. Verificar datos recibidos
    Log::info('📦 Datos recibidos CRUDOS:', $preguntas);
    
        /*if (!session('authenticated')) {
        Log::warning('❌ Usuario no autenticado');
            return response()->json(['success' => false, 'message' => 'No autenticado'], 401);
        }
        try {
        Log::info('✅ Paso 1 - Enviar a Postgres:');

        $pregunta = json_encode($preguntas);
        $ip_usuario = $request->ip();
        // 2. Construir query EXACTA
        $query = "SELECT sau.f_guardar_respuestas('$pregunta', '$ip_usuario') as resultado";
        //$query = "SELECT sau.f_guardar_respuestas('{\"id_pregunta\":\"851\",\"opcion\":\"B\"}', '127.0.0.1/32') as resultado";
        Log::info("🐘 Paso 2 - Query completa: {$query}");

        // 3. Ejecutar en PostgreSQL
        Log::info('🚀 Paso 3 - Ejecutando en PostgreSQL...');
        //$resultado = DB::selectOne($query, [$preguntas, $ip_usuario]);
        $resultado = DB::selectOne($query);

        // 4. Resultado
        Log::info("✅ Paso 4 - Resultado PostgreSQL: {$resultado->resultado}");
        Log::info('🎉 === RESPUESTA ENVIADA EXITOSAMENTE ===');

            return response()->json([
                'success' => true,
                'message' => $resultado->resultado,
                'query_ejecutada' => $query,
                
            ]);

        } catch (\Exception $e) {
        Log::error('💥 ERROR CRÍTICO:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }*/

   public function guardarRespuestas(Request $request)
    {
        try {
            // Recibir cadena JSON tal cual
            $cadena = $request->input('respuestas');

            // IP del usuario
            $ip = $request->ip();

            // LLAMAR A TU FUNCIÓN PostgreSQL
            $resultado = DB::select("
                SELECT * 
                FROM sau.f_guardar_respuestas_todos(?, ?)
            ", [
                $cadena,    // cadena JSON completa
                $ip         // ip en string
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Respuestas guardadas correctamente',
                'data' => $resultado
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => "Error al guardar respuestas: " . $e->getMessage(),
                'ip' => $request->ip()
            ]);
        }
    }

    public function exam()
    {
        return view('exams.index');
    }
}
