<?php

namespace App\Imports;

use App\Models\Actividad;
use App\Models\ParticipanteActividad;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class CuentoImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Obtener metadatos
        $facilitador = $rows[1][1] ?? 'Desconocido';
        $contacto = $rows[2][1] ?? '';
        
        $actividad = Actividad::create([
            'nombre' => 'El cuento en los aprendizajes socializados',
            'grupo' => 'Grupo 1',
            'facilitador' => $facilitador,
            'edad_rango' => '9 a 11 años',
            'duracion' => '26 horas',
            'dias' => 'Lunes y miércoles',
            'fecha_inicio' => Carbon::createFromFormat('d/m/Y', '04/07/2025'),
            'fecha_fin' => Carbon::createFromFormat('d/m/Y', '27/08/2025'),
            'horario' => '10:00 a 13:30'
        ]);

        // Procesar participantes (empezando desde fila 5)
        foreach ($rows->slice(4) as $row) {
            if(empty($row[1])) continue;
            
            $asistencias = [];
            $fechasColumnas = [
                5 => '16/07/2025',
                6 => '21/07/2025',
                // ... completar con todas las columnas de fecha
            ];
            
            foreach($fechasColumnas as $columna => $fecha) {
                if(isset($row[$columna])) {
                    $asistencias[$fecha] = $row[$columna] == 1;
                }
            }
            
            ParticipanteActividad::create([
                'actividad_id' => $actividad->id,
                'nombre_completo' => $row[1],
                'cedula' => $row[2],
                'edad' => $row[3],
                'representante' => $row[4] ?? null,
                'contacto' => $row[5] ?? null,
                'asistencias' => $asistencias
            ]);
        }
    }
}