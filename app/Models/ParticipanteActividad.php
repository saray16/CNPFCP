<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParticipanteActividad extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'participantes_actividades';
    protected $fillable = [
        'actividad_id', 'nombre_completo', 'cedula', 'edad',
        'representante', 'contacto', 'observaciones'
    ];

    protected $casts = [
        'asistencias' => 'array',
        'evaluaciones' => 'array'
    ];

    // Relación corregida con actividad
    public function actividad()
    {
        return $this->belongsTo(ActividadRecreacional::class, 'actividad_id');
    }
}