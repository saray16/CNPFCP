<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formacion extends Model
{
    use HasFactory;

    protected $table = 'formaciones';
    
    protected $fillable = [
        'nombre',
        'tipo',
        'descripcion',
        'categoria',
        'duracion',
        'disponible',
        'disponible_hoy',
        'icono',
       'facilitador',
        'codigo', 
        'created_at',
        'updated_at'
    ];


    public const TIPOS = [
        'C' => 'Curso',
        'T' => 'Taller',
        'D' => 'Diplomado'
    ];

    // Relación con el usuario facilitador
    public function facilitador()
    {
        return $this->belongsTo(User::class, 'facilitador_id');
    }

    // Relación con las inscripciones
    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }

    // Scopes para consultas comunes
    public function scopePorTipo($query, $tipo)
    {
        return $query->where('tipo', $tipo);
    }

    public function scopeDisponibles($query)
    {
        return $query->where('disponible', true);
    }

    public function scopePorCategoria($query, $categoria)
    {
        return $query->where('categoria', $categoria);
    }

    public function scopeDisponiblesHoy($query)
    {
        return $query->where('disponible_hoy', true);
    }

    // Scope para formaciones de un facilitador específico
    public function scopePorFacilitador($query, $facilitadorId)
    {
        return $query->where('facilitador_id', $facilitadorId);
    }

    // Método para obtener el nombre del tipo
    public function getTipoNombreAttribute()
    {
        return self::TIPOS[$this->tipo] ?? 'Desconocido';
    }

    // Método para verificar si está asignado a un facilitador
    public function tieneFacilitador()
    {
        return !is_null($this->facilitador_id);
    }
}