<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActividadRecreacional extends Model
{
     protected $table = 'actividades_recreacionales';
    protected $fillable = [
        'tipo',
        'nombre',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'horas_formacion',
        'rango_edad',
        'semana',
    ];
protected $casts = [
    'fecha' => 'date',
   
];

}
