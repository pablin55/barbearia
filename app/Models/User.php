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
        'role', // admin, barbeiro ou vendedor
        'barbeiro_id',
        'barbeiros', // JSON array de IDs de barbeiros para vendedores
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
            'barbeiros' => 'array',
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

    /**
     * Verifica se é vendedor
     */
    public function isVendedor()
    {
        return $this->role === 'vendedor';
    }

    /**
     * Relacionamento com barbeiro (para usuarios que sao barbeiros)
     */
    public function barbeiro()
    {
        return $this->belongsTo(\App\Models\Barbeiro::class);
    }

    /**
     * Relacionamento com barbeiros (para vendedores)
     * Um vendedor pode gerenciar varios barbeiros
     */
    public function barbeiten()
    {
        return $this->belongsToMany(
            \App\Models\Barbeiro::class,
            'user_barbeiros',
            'user_id',
            'barbeiro_id'
        );
    }

    /**
     * Obtem os IDs dos barbeiros que o usuario pode gerenciar
     * Para vendedores, retorna os barbeiros atribuidos
     * Para barbeiros, retorna apenas seu proprio ID
     */
    public function getAllowedBarberIds(): array
    {
        if ($this->isAdmin()) {
            return []; // Admin pode ver todos
        }

        if ($this->isBarbeiro() && $this->barbeiro_id) {
            return [$this->barbeiro_id];
        }

        if ($this->isVendedor() && $this->barbeiros) {
            return $this->barbeiros;
        }

        return [];
    }

    /**
     * Verifica se o usuario pode ver agendamentos de um barbeiro especifico
     */
    public function canViewBarberAgendamento(int $barbeiroId): bool
    {
        if ($this->isAdmin()) {
            return true;
        }

        $allowedBarbers = $this->getAllowedBarberIds();
        
        return in_array($barbeiroId, $allowedBarbers);
    }
}
