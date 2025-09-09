<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ParticipanteRecreacional;

class ParticipantesActividadesRecreacionales extends Model
{
    use HasFactory;

    protected $table = 'participantes_actividades_recreacionales';
    protected $fillable = [
        'participante_id', 'actividad_id', 'asistencia_total'
    ];

    public function participante()
    {
        return $this->belongsTo(ParticipanteRecreacional::class, 'participante_id');
    }
}
