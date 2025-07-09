<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ActividadRecreacional;

class ActividadesRecreacionalesSeeder extends Seeder
{
    public function run()
    {
        $actividades = [
            [
                'tipo' => 'TALLER',
                'nombre' => 'AJEDREZ INTERMEDIO PARA NIÑOS',
                'fecha' => '2024-08-08',
                'hora_inicio' => '08:30:00',
                'hora_fin' => '10:00:00',
                'horas_formacion' => 2,
                'rango_edad' => '8 A 12 AÑOS',
                'semana' => 'SEMANA 1'
            ],
            [
                'tipo' => 'TALLER',
                'nombre' => 'MATEMÁTICAS RECREATIVAS',
                'fecha' => '2024-08-08',
                'hora_inicio' => '10:00:00',
                'hora_fin' => '12:00:00',
                'horas_formacion' => 2,
                'rango_edad' => '8 A 12 AÑOS',
                'semana' => 'SEMANA 1'
            ],
            [
                'tipo' => 'TALLER',
                'nombre' => 'LA EXPRESIÓN DRAMÁTICA',
                'fecha' => '2024-08-08', // Jueves 8
                'hora_inicio' => '13:00:00',
                'hora_fin' => '15:00:00',
                'horas_formacion' => 4,
                'rango_edad' => '7 A 17 AÑOS',
                'semana' => 'SEMANA 1'
            ],
            [
                'tipo' => 'TALLER',
                'nombre' => 'LA EXPRESIÓN DRAMÁTICA',
                'fecha' => '2024-08-09', // Viernes 9
                'hora_inicio' => '13:00:00',
                'hora_fin' => '15:00:00',
                'horas_formacion' => 4,
                'rango_edad' => '7 A 17 AÑOS',
                'semana' => 'SEMANA 1'
            ],
            [
                'tipo' => 'TALLER',
                'nombre' => 'CUÉNTAME UN CUENTO',
                'fecha' => '2024-08-12',
                'hora_inicio' => '08:30:00',
                'hora_fin' => '10:00:00',
                'horas_formacion' => 2,
                'rango_edad' => '5 A 8 AÑOS',
                'semana' => 'SEMANA 2'
            ],
            [
                'tipo' => 'TALLER',
                'nombre' => 'FÍSICA RECREATIVA',
                'fecha' => '2024-08-12',
                'hora_inicio' => '10:00:00',
                'hora_fin' => '12:00:00',
                'horas_formacion' => 2,
                'rango_edad' => '10 A 12 AÑOS',
                'semana' => 'SEMANA 2'
            ],
            [
                'tipo' => 'TALLER',
                'nombre' => 'CONOCIENDO EL FUNCIONAMIENTO DE NUESTRO CUERPO',
                'fecha' => '2024-08-12',
                'hora_inicio' => '13:00:00',
                'hora_fin' => '15:00:00',
                'horas_formacion' => 2,
                'rango_edad' => '5 A 8 AÑOS',
                'semana' => 'SEMANA 2'
            ],
            [
                'tipo' => 'TALLER',
                'nombre' => 'INGLÉS PARA PRINCIPIANTES',
                'fecha' => '2024-08-13',
                'hora_inicio' => '09:00:00',
                'hora_fin' => '11:00:00',
                'horas_formacion' => 2,
                'rango_edad' => '8 A 10 AÑOS',
                'semana' => 'SEMANA 2'
            ],
            [
                'tipo' => 'TALLER',
                'nombre' => 'EL MUNDO DIVERTIDO DE LAS PLANTAS',
                'fecha' => '2024-08-13',
                'hora_inicio' => '11:00:00',
                'hora_fin' => '12:30:00',
                'horas_formacion' => 2,
                'rango_edad' => '5 A 8 AÑOS',
                'semana' => 'SEMANA 2'
            ],
            [
                'tipo' => 'CHARLA',
                'nombre' => 'CONOZCO MI CUERPO Y APRENDO A CUIDARLO',
                'fecha' => '2024-08-13',
                'hora_inicio' => '13:00:00',
                'hora_fin' => '15:00:00',
                'horas_formacion' => 2,
                'rango_edad' => '14 A 17 AÑOS',
                'semana' => 'SEMANA 2'
            ],
            [
                'tipo' => 'TALLER',
                'nombre' => 'BUSCANDO LAS MATEMÁTICAS',
                'fecha' => '2024-08-14',
                'hora_inicio' => '09:00:00',
                'hora_fin' => '10:30:00',
                'horas_formacion' => 2,
                'rango_edad' => '8 A 12 AÑOS',
                'semana' => 'SEMANA 2'
            ],
            [
                'tipo' => 'TALLER',
                'nombre' => 'CONOCIENDO EL APASIONANTE MUNDO DE LA QUÍMICA',
                'fecha' => '2024-08-14',
                'hora_inicio' => '10:30:00',
                'hora_fin' => '12:00:00',
                'horas_formacion' => 2,
                'rango_edad' => '10 A 12 AÑOS',
                'semana' => 'SEMANA 2'
            ],
            [
                'tipo' => 'TALLER',
                'nombre' => 'APRENDIENDO SOBRE EL MUNDO ANIMAL',
                'fecha' => '2024-08-14',
                'hora_inicio' => '13:00:00',
                'hora_fin' => '15:00:00',
                'horas_formacion' => 2,
                'rango_edad' => '5 A 8 AÑOS',
                'semana' => 'SEMANA 2'
            ],
            [
                'tipo' => 'TALLER',
                'nombre' => 'MATEMÁTICAS RECREATIVAS',
                'fecha' => '2024-08-15',
                'hora_inicio' => '10:00:00',
                'hora_fin' => '12:00:00',
                'horas_formacion' => 2,
                'rango_edad' => '8 A 12 AÑOS',
                'semana' => 'SEMANA 2'
            ],
            [
                'tipo' => 'TALLER',
                'nombre' => 'JOROPO ORIENTAL, SAN JUAN DE BARLOVENTO, CULO´E PUYA, MINA',
                'fecha' => '2024-08-16',
                'hora_inicio' => '08:30:00',
                'hora_fin' => '10:00:00',
                'horas_formacion' => 2,
                'rango_edad' => '8 A 17 AÑOS',
                'semana' => 'SEMANA 2'
            ],
            [
                'tipo' => 'TALLER',
                'nombre' => 'POR AMOR A LAS MATEMÁTICAS',
                'fecha' => '2024-08-16',
                'hora_inicio' => '10:00:00',
                'hora_fin' => '12:00:00',
                'horas_formacion' => 2,
                'rango_edad' => '10 A 17 AÑOS',
                'semana' => 'SEMANA 2'
            ],
            [
                'tipo' => 'TALLER',
                'nombre' => 'GAITA DE TAMBORA, TAMBOR CORIANO, SANGUEO Y GOLPE DE SAN MILLAN',
                'fecha' => '2024-08-20',
                'hora_inicio' => '13:00:00',
                'hora_fin' => '15:00:00',
                'horas_formacion' => 2,
                'rango_edad' => '8 A 17 AÑOS',
                'semana' => 'SEMANA 3'
            ],
            [
                'tipo' => 'TALLER',
                'nombre' => 'POR AMOR A LAS MATEMÁTICAS',
                'fecha' => '2024-08-30',
                'hora_inicio' => '10:00:00',
                'hora_fin' => '12:00:00',
                'horas_formacion' => 2,
                'rango_edad' => '10 A 17 AÑOS',
                'semana' => 'SEMANA 4'
            ],
            [
                'tipo' => 'TALLER',
                'nombre' => 'LA MARAVILLA DEL INGLES EN NUESTRAS VACACIONES',
                'fecha' => '2024-08-30',
                'hora_inicio' => '13:00:00',
                'hora_fin' => '15:00:00',
                'horas_formacion' => 2,
                'rango_edad' => '12 A 17 AÑOS',
                'semana' => 'SEMANA 4'
            ]
        ];

        foreach ($actividades as $actividad) {
            ActividadRecreacional::create($actividad);
        }
    }
}