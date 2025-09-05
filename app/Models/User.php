<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    const ROLE_ADMIN = 'admin';
    const ROLE_FACILITADOR = 'facilitador';
    const ROLE_USUARIO = 'usuario';
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
   public function formacionesComoFacilitador()
    {
        return $this->belongsToMany(Formacion::class, 'formacion_facilitador', 'user_id', 'formacion_id')
            ->withTimestamps();
    }
    // -------------------------------
    // MÉTODOS DE AYUDA PARA LOS ROLES
    // -------------------------------

    public function isAdmin(): bool
    {
        return $this->rol === 'admin';
    }

    public function isFacilitador(): bool
    {
        return $this->rol === 'facilitador';
    }

    public function isUsuario(): bool
    {
        return $this->rol === 'usuario';
    }
}
