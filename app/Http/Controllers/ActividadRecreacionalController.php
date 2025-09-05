<?php

namespace App\Http\Controllers;

use App\Models\ActividadRecreacional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ActividadRecreacionalController extends Controller
{
    /**
     * Obtener participantes de actividades recreacionales (VERSIÓN MEJORADA)
     * Ahora detecta automáticamente la tabla correcta según el nombre de la actividad
     */
    public function getParticipantes($actividadId)
    {
        try {
            Log::info("Solicitando participantes para actividad ID: $actividadId");
            
            // Verificar que la actividad existe
            $actividad = ActividadRecreacional::find($actividadId);
            
            if (!$actividad) {
                return response()->json([
                    'error' => 'Actividad no encontrada',
                    'participantes' => [],
                    'total' => 0
                ], 404);
            }
            
            Log::info("Actividad encontrada: " . $actividad->nombre);
            
            // Determinar qué tabla usar basado en el nombre de la actividad
            $tabla = $this->determinarTablaParticipantes($actividad->nombre);
            Log::info("Usando tabla: $tabla para actividad: " . $actividad->nombre);
            
            // Verificar si la tabla existe
            try {
                $tableExists = DB::table('information_schema.tables')
                    ->where('table_schema', env('DB_DATABASE'))
                    ->where('table_name', $tabla)
                    ->exists();
                    
                if (!$tableExists) {
                    Log::error("La tabla $tabla no existe en la base de datos");
                    return response()->json([
                        'error' => 'La tabla de participantes no existe',
                        'participantes' => [],
                        'total' => 0
                    ], 500);
                }
            } catch (\Exception $e) {
                Log::error('Error verificando tabla: ' . $e->getMessage());
                return response()->json([
                    'error' => 'Error accediendo a la base de datos',
                    'participantes' => [],
                    'total' => 0
                ], 500);
            }
            
            // Obtener participantes específicos para esta actividad
            $participantes = DB::table($tabla)
                ->where('actividad_id', $actividadId)
                ->select('id', 'nombre_completo', 'año', 'created_at')
                ->orderBy('created_at', 'desc')
                ->get();
                
            Log::info("Participantes encontrados para actividad $actividadId: " . $participantes->count());
            
            // Transformar los datos para la respuesta
            $participantesTransformados = $participantes->map(function($participante) {
                return [
                    'ID' => $participante->id,
                    'NOMBRE COMPLETO' => $participante->nombre_completo,
                    'ARO' => $participante->año,
                    'FECHA INSCENPICON' => Carbon::parse($participante->created_at)->format('d/m/Y H:i')
                ];
            });

            return response()->json([
                'participantes' => $participantesTransformados,
                'total' => $participantesTransformados->count(),
                'actividad_nombre' => $actividad->nombre,
                'debug' => [
                    'tabla_utilizada' => $tabla,
                    'actividad_id_buscado' => $actividadId
                ]
            ]);
            
        } catch (\Exception $e) {
            Log::error('Error en getParticipantes: '.$e->getMessage());
            Log::error('Trace: '.$e->getTraceAsString());
            
            return response()->json([
                'error' => 'Error interno del servidor: ' . $e->getMessage(),
                'participantes' => [],
                'total' => 0
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
}