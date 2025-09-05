<?php

namespace App\Imports;

use App\Models\ActividadRecreacional;
use App\Models\ParticipanteActividad;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class ActividadesRecreacionalesImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Obtener metadatos de la actividad
        $metadata = $this->extraerMetadatos($rows);
        
        // Crear la actividad
        $actividad = ActividadRecreacional::create($metadata);

        // Procesar participantes (filas 6 en adelante)
        foreach ($rows->slice(5) as $row) {
            if(empty($row[1])) continue; // Saltar filas vacías

            $participante = $this->procesarParticipante($row);
            $participante['actividad_id'] = $actividad->id;
            
            ParticipanteActividad::create($participante);
        }
    }

    private function extraerMetadatos($rows)
    {
        return [
            'nombre_actividad' => 'El cuento en los aprendizajes socializados',
            'grupo' => 'Grupo 1',
            'facilitador' => $rows[1][1] ?? 'No especificado',
            'edad_rango' => '9 a 11 años',
            'duracion' => '26 horas',
            'dias' => 'Lunes y miércoles',
            'fecha_inicio' => Carbon::createFromFormat('d/m/Y', '16/07/2025'),
            'fecha_fin' => Carbon::createFromFormat('d/m/Y', '27/08/2025'),
            'horario' => '10:00 a 13:30'
        ];
    }

    private function procesarParticipante($row)
    {
        $asistencias = [];
        $fechasColumnas = [
            5 => '16/07/2025',
            6 => '21/07/2025',
            7 => '23/07/2025',
            8 => '28/07/2025',
            9 => '30/07/2025'
            // Añade más fechas según corresponda
        ];

        foreach($fechasColumnas as $columna => $fecha) {
            if(isset($row[$columna])) {
                $asistencias[$fecha] = $row[$columna] == 1;
            }
        }

        return [
            'nombre_completo' => $row[1],
            'cedula' => $row[2] ?? '',
            'edad' => $row[3] ?? 0,
            'representante' => $row[4] ?? null,
            'contacto' => $row[5] ?? null,
            'asistencias' => $asistencias
        ];
    }
}