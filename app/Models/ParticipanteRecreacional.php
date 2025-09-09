<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ActividadRecreacional;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ParticipanteRecreacional extends Model
{
    use HasFactory;

    protected $table = 'participantes_recreacionales';
    
    protected $fillable = [
        'nombre_apellido', 
        'edad'
    ];

    protected $casts = [
        'edad' => 'integer',
    ];
}
