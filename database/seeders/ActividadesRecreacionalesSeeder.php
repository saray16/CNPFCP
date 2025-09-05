<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ActividadRecreacional;
use Carbon\Carbon;

class ActividadesRecreacionalesSeeder extends Seeder
{
    public function run()
    {
        $actividades = [
            // 1. Ajedrez (9-10 años)
            [
                'tipo' => 'TALLER',
                'nombre' => 'Ajedrez',
                'horario' => 'martes y jueves 9:00-10:30',
                'fecha_inicio' => '2025-07-15',
                'fecha_fin' => '2025-08-12',
                'horas_formacion' => 2,
                'edades' => '9-10 años',
                'espacio' => 'FRANCISCO DUARTE',
                'facilitador' => 'Antonio Méndez',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 0
            ],
           
            // 2. Ajedrez (11-17 años)
            [
                'tipo' => 'TALLER',
                'nombre' => 'Ajedrez',
                'horario' => 'martes y jueves 10:40-12:10',
                'fecha_inicio' => '2025-07-17',
                'fecha_fin' => '2025-08-19',
                'horas_formacion' => 2,
                'edades' => '11-17 años',
                'espacio' => 'FRANCISCO DUARTE',
                'facilitador' => 'Antonio Méndez',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 0
            ],
           
            // 3. El cuento en francés (9-11 años)
            [
                'tipo' => 'TALLER',
                'nombre' => 'El cuento en los aprendizajes socializados: Creando en francés',
                'horario' => 'lunes y miércoles 10:00-11:30',
                'fecha_inicio' => '2025-07-16',
                'fecha_fin' => '2025-08-27',
                'horas_formacion' => 1.5,
                'edades' => '9-11 años',
                'espacio' => 'SALA PRESIDENCIA',
                'facilitador' => 'Devorah Cabrera',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 0
            ],
           
            // 4. El cuento en francés (12-14 años)
            [
                'tipo' => 'TALLER',
                'nombre' => 'El cuento en los aprendizajes socializados: Creando en francés',
                'horario' => 'martes y jueves 10:00-11:30',
                'fecha_inicio' => '2025-07-15',
                'fecha_fin' => '2025-08-28',
                'horas_formacion' => 1.5,
                'edades' => '12-14 años',
                'espacio' => 'SALA PRESIDENCIA',
                'facilitador' => 'Devorah Cabrera',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 1
            ],
           
            // 5. El cuento en francés (15-17 años)
            [
                'tipo' => 'TALLER',
                'nombre' => 'El cuento en los aprendizajes socializados: Creando en francés',
                'horario' => 'lunes y miércoles 10:00-11:30',
                'fecha_inicio' => '2025-09-01',
                'fecha_fin' => '2025-09-29',
                'horas_formacion' => 1.5,
                'edades' => '15-17 años',
                'espacio' => 'SALA PRESIDENCIA',
                'facilitador' => 'Devorah Cabrera',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 0
            ],
           
            // 6. El cuento en francés (18-20 años)
            [
                'tipo' => 'TALLER',
                'nombre' => 'El cuento en los aprendizajes socializados: Creando en francés',
                'horario' => 'martes y jueves 10:00-11:30',
                'fecha_inicio' => '2025-09-02',
                'fecha_fin' => '2025-09-30',
                'horas_formacion' => 1.5,
                'edades' => '18-20 años',
                'espacio' => 'SALA PRESIDENCIA',
                'facilitador' => 'Devorah Cabrera',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 0
            ],
           
            // 7. El cuento en francés (Adultos)
            [
                'tipo' => 'TALLER',
                'nombre' => 'El cuento en los aprendizajes socializados: Creando en francés',
                'horario' => 'viernes 09:00-11:00',
                'fecha_inicio' => '2025-09-05',
                'fecha_fin' => '2025-09-26',
                'horas_formacion' => 2,
                'edades' => 'Adultos',
                'espacio' => 'SALA PRESIDENCIA',
                'facilitador' => 'Devorah Cabrera',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 1
            ],
           
            // 8. Inglés para principiantes - Grupo 1
            [
                'tipo' => 'TALLER',
                'nombre' => 'Inglés para principiantes',
                'horario' => 'lunes 10:00-11:30',
                'fecha_inicio' => '2025-07-21',
                'fecha_fin' => '2025-08-18',
                'horas_formacion' => 1.5,
                'edades' => '14 años y mas',
                'espacio' => 'FRANCISCO DUARTE',
                'facilitador' => 'Antonio Méndez',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 1
            ],
           
            // 9. Inglés para principiantes - Grupo 2
            [
                'tipo' => 'TALLER',
                'nombre' => 'Inglés para principiantes',
                'horario' => 'lunes 1:30-3:00',
                'fecha_inicio' => '2025-08-25',
                'fecha_fin' => '2025-09-22',
                'horas_formacion' => 1.5,
                'edades' => '14 años y mas',
                'espacio' => 'FRANCISCO DUARTE',
                'facilitador' => 'Antonio Méndez',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 1
            ],
           
            // 10. Cantos y cuentos en vacaciones
            [
                'tipo' => 'TALLER',
                'nombre' => 'Cantos y cuentos en vacaciones (5 y 6 años)',
                'horario' => 'martes 09:00-10:30',
                'fecha_inicio' => '2025-08-05',
                'fecha_fin' => '2025-08-26',
                'horas_formacion' => 1.5,
                'edades' => '5 y 6 años',
                'espacio' => 'Sala de lectura infantil y juvenil (piso 1)',
                'facilitador' => 'Andry Elizandre y Devorah Cabrera',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 0
            ],
           
            // 11. Matemática Recreativa
            [
                'tipo' => 'TALLER',
                'nombre' => 'Matemática Recreativa',
                'horario' => 'lunes y miércoles 10:00-12:00',
                'fecha_inicio' => '2025-08-04',
                'fecha_fin' => '2025-08-27',
                'horas_formacion' => 2,
                'edades' => '8 a 12 años',
                'espacio' => 'BIBLIOTECA CENAMEC',
                'facilitador' => 'Yolanda Serres',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 0
            ],
           
            // 12. Construye tu propia computadora
            [
                'tipo' => 'TALLER',
                'nombre' => 'Construye tu propia computadora (NIÑO-REPRESENTANTE)',
                'horario' => 'jueves 9:00 am-3:00 pm',
                'fecha_inicio' => '2025-08-21',
                'fecha_fin' => '2025-08-21',
                'horas_formacion' => 6,
                'edades' => '7 a 12 años',
                'espacio' => 'FRANCISCO DUARTE',
                'facilitador' => 'Omar Ovalles',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 0
            ],
           
            // 13. Danza tradicional venezolana
            [
                'tipo' => 'TALLER',
                'nombre' => 'Danza tradicional venezolana',
                'horario' => 'miercoles y viernes 9:00-12:00',
                'fecha_inicio' => '2025-08-06',
                'fecha_fin' => '2025-08-08',
                'horas_formacion' => 3,
                'edades' => '5 a 12 años',
                'espacio' => 'PASILLO',
                'facilitador' => 'Mayra Silva',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 0
            ],
           
            // 14. Física Recreativa
            [
                'tipo' => 'TALLER',
                'nombre' => 'Física Recreativa',
                'horario' => 'lun y mier 9:00-12:00 / martes 1:30-3:00',
                'fecha_inicio' => '2025-08-18',
                'fecha_fin' => '2025-08-20',
                'horas_formacion' => 3,
                'edades' => '7 a 12 años',
                'espacio' => 'SALON SIMON BOLIVAR',
                'facilitador' => 'Humberto Valencia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 0
            ],
           
            // 15. Evolución del cine
            [
                'tipo' => 'TALLER',
                'nombre' => 'Evolución del cine',
                'horario' => 'lunes y miercoles 9:00-12:00',
                'fecha_inicio' => '2025-08-25',
                'fecha_fin' => '2025-08-27',
                'horas_formacion' => 3,
                'edades' => '7 a 12 años',
                'espacio' => 'SALON SIMON BOLIVAR',
                'facilitador' => 'Colectivo informática',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 0
            ],
           
            // 16. El jardín secreto
            [
                'tipo' => 'TALLER',
                'nombre' => 'El jardin secreto. Creación de un mini invernadero',
                'horario' => 'martes 1:30-3:00pm y jueves9:00-12:00',
                'fecha_inicio' => '2025-08-05',
                'fecha_fin' => '2025-08-07',
                'horas_formacion' => 3,
                'edades' => '5 a 12 años',
                'espacio' => 'MIREYA NEBREDA',
                'facilitador' => 'Sorely Hurtado',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 0
            ],
           
            // 17. El mágico mundo de los colores
            [
                'tipo' => 'TALLER',
                'nombre' => 'El mágico mundo de los colores en la química',
                'horario' => 'martes 1:30-3:00pm y jueves9:00-12:00',
                'fecha_inicio' => '2025-08-12',
                'fecha_fin' => '2025-08-14',
                'horas_formacion' => 3,
                'edades' => '6 a 12 años',
                'espacio' => 'MIREYA NEBREDA',
                'facilitador' => 'Soraya Plaza',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 1
            ],
           
            // 18. El maravilloso mundo de los alimentos
            [
                'tipo' => 'TALLER',
                'nombre' => 'El maravilloso mundo de los alimentos',
                'horario' => 'martes 1:30-3:00pm y jueves9:00-12:00',
                'fecha_inicio' => '2025-08-19',
                'fecha_fin' => '2025-08-21',
                'horas_formacion' => 3,
                'edades' => '6 a 12 años',
                'espacio' => 'MIREYA NEBREDA',
                'facilitador' => 'Jasmín Silva',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 0
            ],
           
            // 19. La microscopía desde la práctica
            [
                'tipo' => 'TALLER',
                'nombre' => 'La microscopía desde la práctica',
                'horario' => 'miércoles y viernes 9:00-12:00',
                'fecha_inicio' => '2025-08-20',
                'fecha_fin' => '2025-08-22',
                'horas_formacion' => 3,
                'edades' => '6 a 12 años',
                'espacio' => 'MIREYA NEBREDA',
                'facilitador' => 'Ernesto Linares',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 0
            ],
           
            // 20. Las características de las plantas
            [
                'tipo' => 'TALLER',
                'nombre' => 'Las características de las plantas (Herbario)',
                'horario' => 'Jueves y viernes 1:00-3:00pm',
                'fecha_inicio' => '2025-08-21',
                'fecha_fin' => '2025-08-22',
                'horas_formacion' => 2,
                'edades' => '12-18 años',
                'espacio' => 'MIREYA NEBREDA',
                'facilitador' => 'Katiuska Osorio',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 0
            ],
           
            // 21. Escribe, pinta y crea
            [
                'tipo' => 'TALLER',
                'nombre' => 'Escribe, pinta y crea de forma divertida',
                'horario' => 'Lunes y martes 1:00-3:00pm',
                'fecha_inicio' => '2025-08-04',
                'fecha_fin' => '2025-08-05',
                'horas_formacion' => 2,
                'edades' => '7-12 años',
                'espacio' => 'Salon DIF (piso 5)',
                'facilitador' => 'Rosa Sanchez/Facundo Madriz',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 1
            ],
           
            // 22. 8 novenos por el amor a las matemáticas
            [
                'tipo' => 'TALLER',
                'nombre' => '8 novenos por el amor a las matemáticas',
                'horario' => 'miércoles 1:30 a 3:00 pm',
                'fecha_inicio' => '2025-08-06',
                'fecha_fin' => '2025-08-27',
                'horas_formacion' => 1.5,
                'edades' => '10 años en adelante',
                'espacio' => 'BIBLIOTECA CENAMEC',
                'facilitador' => 'Naudys Arcia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 0
            ],
           
            // 23. Beisbolmático GRUPO 1
            [
                'tipo' => 'TALLER',
                'nombre' => 'Beisbolmático GRUPO 1',
                'horario' => 'martes y viernes (12:30-2:00pm)',
                'fecha_inicio' => '2025-08-05',
                'fecha_fin' => '2025-09-05',
                'horas_formacion' => 1.5,
                'edades' => '8 a 11 años',
                'espacio' => 'por definir',
                'facilitador' => 'Juan Morales',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 0
            ],
           
            // 24. Beisbolmático GRUPO 2
            [
                'tipo' => 'TALLER',
                'nombre' => 'Beisbolmático GRUPO 2',
                'horario' => 'martes y viernes (9:00-11:00)',
                'fecha_inicio' => '2025-08-05',
                'fecha_fin' => '2025-09-05',
                'horas_formacion' => 2,
                'edades' => '12 a 16 años',
                'espacio' => 'por definir',
                'facilitador' => 'Juan Morales',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 0
            ],
           
            // 25. Los juguetes de Tomás
            [
                'tipo' => 'TALLER',
                'nombre' => 'Los juguetes de Tomás',
                'horario' => 'lunes y miércoles (1:00 a 3:30 pm)',
                'fecha_inicio' => '2025-07-01',
                'fecha_fin' => '2025-08-31',
                'horas_formacion' => 2.5,
                'edades' => 'a partir de 5 años',
                'espacio' => 'FRANCISCO DUARTE',
                'facilitador' => 'Tomás Mieres',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'cupo_completo' => 0
            ]
        ];

        foreach ($actividades as $actividad) {
            ActividadRecreacional::create($actividad);
        }
    }
}