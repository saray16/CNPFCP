<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ParticipantesActividadesRecreacionales;


class ActividadParticipanteController extends Controller
{
    public function getParticipantes($actividadId)
    {
        try {
            // 1. Verificar si la actividad existe
            $actividad = DB::table('actividades_recreacionales')
                ->where('id', $actividadId)
                ->select('id', 'nombre', 'tipo', 'facilitador')
                ->first();

            if (!$actividad) {
                return response()->json([
                    'success' => false,
                    'message' => 'Actividad no encontrada',
                    'participantes' => [],
                    'total' => 0
                ], 404);
            }

            // 2. Obtener participantes de la actividad
            $participantes = DB::table('participantes_actividades_recreacionales as par')
                ->join('participantes_recreacionales as pr', 'par.participante_id', '=', 'pr.id')
                ->where('par.actividad_id', $actividadId)
                ->select(
                    'pr.id',
                    'pr.nombre_apellido',
                    'pr.edad',
                    'par.created_at as fecha_inscripcion',
                    'par.asistencia_total'
                )
                ->orderBy('pr.nombre_apellido')
                ->get();

            // 3. Formatear la respuesta
            $participantesFormateados = $participantes->map(function($participante, $index) {
                return [
                    'numero' => $index + 1,
                    'NOMBRE COMPLETO' => $participante->nombre_apellido,
                    'EDAD' => $participante->edad,
                    'FECHA INSCRIPCION' => $participante->fecha_inscripcion,
                    'ASISTENCIA' => $participante->asistencia_total,
                    'ID' => $participante->id
                ];
            });

            return response()->json([
                'success' => true,
                'actividad' => [
                    'id' => $actividad->id,
                    'nombre' => $actividad->nombre,
                    'tipo' => $actividad->tipo,
                    'facilitador' => $actividad->facilitador
                ],
                'participantes' => $participantesFormateados,
                'total' => $participantesFormateados->count()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
                'participantes' => [],
                'total' => 0
            ], 500);
        }
    }

    public function getParticipantesRecreacionales($taller){
        // Cargar la relación con participante
        $participantes = ParticipantesActividadesRecreacionales::with('participante')
            ->where('actividad_id', '=', $taller)
            ->get();
        
        return response()->json([
            'success' => true,
            'taller' => $taller,
            'participantes' => $participantes,
            'count' => $participantes->count()
        ]);
    }
}