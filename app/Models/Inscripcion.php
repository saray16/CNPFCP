<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $table = 'inscripciones';

    protected $fillable = [
        'user_id',
        'nombre',
        'cedula',
        'estado',
        'taller',
        'curso',
        'diplomado',
        'horas',
        'tipo_formacion',
        'dia',
        'mes',
        'anio',
        'facilitador',
        'codigo_facilitador',
        'aprobado_por_facilitador',
        'aprobado_por_admin',
        'fecha_aprobacion_facilitador',
        'fecha_aprobacion_admin',
        'facilitador_id',
        'estado_formacion',
        'formacion_id', 
        'certificado_pdf_path', 
         'comentarios',
         'nota',
         'modulo',
         'fecha_finalizacion',
         'certificado_url',
         


    
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

    public function formacion()
    {
        return $this->belongsTo(Formacion::class, 'formacion_id');
    }
        public function facilitador()
    {
        return $this->belongsTo(User::class, 'facilitador_id');
    }
// En app/Models/Inscripcion.php
public function getNombreFormacionAttribute()
{
    return match($this->tipo_formacion) {
        'C' => $this->curso,
        'T' => $this->taller,
        'D' => $this->diplomado,
        default => 'N/A'
    };
}

public function getTipoFormacionTextoAttribute()
{
    return match($this->tipo_formacion) {
        'C' => 'Curso',
        'T' => 'Taller',
        'D' => 'Diplomado',
        default => 'N/A'
    };
}
   
}
