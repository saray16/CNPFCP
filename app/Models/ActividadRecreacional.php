<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActividadRecreacional extends Model
{
    use HasFactory;

    protected $table = 'actividades_recreacionales';
   protected $fillable = [
    'nombre',       // CORREGIDO: 'nombre_actividad' -> 'nombre'
    'tipo',
    'facilitador',
    'edades',       // CORREGIDO: 'edad_rango' -> 'edades'
    'duracion',     // opcional si lo usas
    'dias',         // opcional si lo usas
    'fecha_inicio', // debería ser date o datetime según migración
    'fecha_fin',
    'horario',
    'cupo_completo'
];


    protected $dates = ['fecha_inicio', 'fecha_fin'];

    // Relación corregida con participantes
    public function participantes()
    {
        return $this->hasMany(ParticipanteActividad::class, 'actividad_id');
    }
}