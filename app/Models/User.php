<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Campos que podem ser preenchidos
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // admin ou barbeiro
    ];

    /**
     * Campos ocultos
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Conversões de tipo
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Verifica se é admin
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Verifica se é barbeiro
     */
    public function isBarbeiro()
    {
        return $this->role === 'barbeiro';
    }
        public function barbeiro()
    {
        return $this->belongsTo(\App\Models\Barbeiro::class);
    }
}