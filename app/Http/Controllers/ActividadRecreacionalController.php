<?php

namespace App\Http\Controllers;

use App\Models\ActividadRecreacional;
use App\Models\Formacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ActividadRecreacionalController extends Controller
{
    /**
     * Obtener participantes de actividades recreacionales Y formaciones normales
     * Ahora detecta automáticamente si es actividad recreacional o formación normal
     */
    public function getParticipantes($actividadId)
    {
        try {
            Log::info("Solicitando participantes para ID: $actividadId");
            
            // PRIMERO: Intentar como formación normal (tabla participantes_actividades)
            $participantesFormaciones = DB::table('participantes_actividades')
                ->join('participantes', 'participantes_actividades.participante_id', '=', 'participantes.id')
                ->where('participantes_actividades.actividad_id', $actividadId)
                ->select(
                    'participantes.id',
                    'participantes.nombre_apellido as nombre_completo',
                    'participantes.edad',
                    'participantes_actividades.created_at'
                )
                ->get();

            Log::info("Participantes encontrados en formaciones normales: " . $participantesFormaciones->count());
            
            // Si encontramos participantes en formaciones normales, retornarlos
            if ($participantesFormaciones->count() > 0) {
                $participantesTransformados = $participantesFormaciones->map(function($participante) {
                    return [
                        'participante' => [
                            'nombre_completo' => $participante->nombre_completo,
                            'edad' => $participante->edad
                        ],
                        'created_at' => $participante->created_at
                    ];
                });

                return response()->json([
                    'success' => true,
                    'participantes' => $participantesTransformados,
                    'tipo' => 'formacion_normal'
                ]);
            }
            
            // SEGUNDO: Si no hay en formaciones normales, buscar como actividad recreacional
            Log::info("No se encontraron participantes en formaciones normales, buscando como actividad recreacional...");
            
            // Verificar que la actividad recreacional existe
            $actividad = ActividadRecreacional::find($actividadId);
            
            if (!$actividad) {
                return response()->json([
                    'success' => false,
                    'message' => 'Actividad no encontrada',
                    'participantes' => []
                ], 404);
            }
            
            Log::info("Actividad recreacional encontrada: " . $actividad->nombre);
            
            // Determinar qué tabla usar basado en el nombre de la actividad
            $tabla = $this->determinarTablaParticipantes($actividad->nombre);
            Log::info("Usando tabla recreacional: $tabla para actividad: " . $actividad->nombre);
            
            // Verificar si la tabla existe
            try {
                $tableExists = DB::table('information_schema.tables')
                    ->where('table_schema', env('DB_DATABASE'))
                    ->where('table_name', $tabla)
                    ->exists();
                    
                if (!$tableExists) {
                    Log::error("La tabla $tabla no existe en la base de datos");
                    return response()->json([
                        'success' => false,
                        'message' => 'La tabla de participantes no existe',
                        'participantes' => []
                    ], 500);
                }
            } catch (\Exception $e) {
                Log::error('Error verificando tabla: ' . $e->getMessage());
                return response()->json([
                    'success' => false,
                    'message' => 'Error accediendo a la base de datos',
                    'participantes' => []
                ], 500);
            }
            
            // Obtener participantes específicos para esta actividad recreacional
            $participantesRecreacionales = DB::table($tabla)
                ->where('actividad_id', $actividadId)
                ->select('id', 'nombre_completo', 'año', 'created_at')
                ->orderBy('created_at', 'desc')
                ->get();
                
            Log::info("Participantes encontrados en actividad recreacional: " . $participantesRecreacionales->count());
            
            // Transformar los datos para la respuesta
            $participantesTransformados = $participantesRecreacionales->map(function($participante) {
                return [
                    'participante' => [
                        'nombre_completo' => $participante->nombre_completo,
                        'edad' => $participante->año // Nota: en recreacionales usan 'año' como edad
                    ],
                    'created_at' => $participante->created_at
                ];
            });

            return response()->json([
                'success' => true,
                'participantes' => $participantesTransformados,
                'tipo' => 'actividad_recreacional'
            ]);
            
        } catch (\Exception $e) {
            Log::error('Error en getParticipantes: '.$e->getMessage());
            Log::error('Trace: '.$e->getTraceAsString());
            
            return response()->json([
                'success' => false,
                'message' => 'Error interno del servidor: ' . $e->getMessage(),
                'participantes' => []
            ], 500);
        }
    }

    /**
     * Determina la tabla de participantes basado en el nombre de la actividad
     */
    private function determinarTablaParticipantes($nombreActividad)
    {
        // Mapeo de nombres de actividad a tablas
        $mapeo = [
            'Ajedrez GRUPO II' => 'participantes_ajedrez_grupo2',
            'Ajedrez_Grupo-2' => 'participantes_ajedrez_grupo2',
            'Ajedrez GRUPO I' => 'participantes_ajedrez',
            // Puedes agregar más mapeos aquí para otras actividades
        ];
        
        // Buscar coincidencias exactas primero
        foreach ($mapeo as $key => $tabla) {
            if (stripos($nombreActividad, $key) !== false) {
                return $tabla;
            }
        }
        
        // Por defecto, usar la tabla general de ajedrez
        return 'participantes_ajedrez';
    }

    /**
     * Método para debugging completo
     */
    public function debugTable()
    {
        try {
            // Información de la estructura de la tabla
            $tableInfo = DB::select("DESCRIBE participantes_ajedrez");
            
            // Todos los datos de la tabla
            $tableData = DB::table('participantes_ajedrez')->get();
            
            // Contar registros por actividad_id
            $groupByActividad = DB::table('participantes_ajedrez')
                ->select('actividad_id', DB::raw('count(*) as total'))
                ->groupBy('actividad_id')
                ->get();
            
            // Verificar las actividades existentes
            $actividades = DB::table('actividades_recreacionales')
                ->select('id', 'nombre')
                ->get();

            return response()->json([
                'table_structure' => $tableInfo,
                'table_data' => $tableData,
                'count_total' => DB::table('participantes_ajedrez')->count(),
                'group_by_actividad' => $groupByActividad,
                'actividades_existentes' => $actividades,
                'database_name' => env('DB_DATABASE')
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
    }

    /**
     * Método para verificar datos específicos de cualquier tabla
     */
    public function checkActividadData($actividadId)
    {
        try {
            $actividad = ActividadRecreacional::find($actividadId);
            if (!$actividad) {
                return response()->json(['error' => 'Actividad no encontrada'], 404);
            }

            $tabla = $this->determinarTablaParticipantes($actividad->nombre);
            $data = DB::table($tabla)->where('actividad_id', $actividadId)->get();

            return response()->json([
                'actividad_id' => $actividadId,
                'actividad_nombre' => $actividad->nombre,
                'tabla_utilizada' => $tabla,
                'participantes' => $data,
                'count' => $data->count()
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Método para obtener el mapeo de tablas
     */
    public function getMapaTablas()
    {
        $actividades = DB::table('actividades_recreacionales')->get();
        
        $mapeo = [];
        foreach ($actividades as $actividad) {
            $mapeo[] = [
                'id' => $actividad->id,
                'nombre' => $actividad->nombre,
                'tabla_asignada' => $this->determinarTablaParticipantes($actividad->nombre)
            ];
        }

        return response()->json($mapeo);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}