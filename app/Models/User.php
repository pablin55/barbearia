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
     * ============================
     * 🔐 TIPOS DE USUÁRIO
     * ============================
     */

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isBarbeiro()
    {
        return $this->role === 'barbeiro';
    }

    public function isVendedor()
    {
        return $this->role === 'vendedor';
    }

    /**
     * ============================
     * 🔗 RELACIONAMENTOS
     * ============================
     */

    /**
     * Um usuário barbeiro pertence a um barbeiro
     */
    public function barbeiro()
    {
        return $this->belongsTo(\App\Models\Barbeiro::class);
    }

    /**
     * Um vendedor pode gerenciar vários barbeiros
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
     * ============================
     * 🚫 VERIFICAÇÃO DE ATIVO
     * ============================
     */

    /**
     * Verifica se o usuário (barbeiro) está ativo
     * - Admin e vendedor sempre retornam true
     * - Barbeiro depende do campo "ativo" na tabela barbeiros
     */
    public function isAtivo(): bool
    {
        // Admin sempre ativo
        if ($this->isAdmin()) {
            return true;
        }

        // Vendedor sempre ativo
        if ($this->isVendedor()) {
            return true;
        }

        // Se for barbeiro, verifica o status
        if ($this->isBarbeiro()) {
            return optional($this->barbeiro)->ativo === true;
        }

        return false;
    }

    /**
     * ============================
     * 🎯 PERMISSÕES DE ACESSO
     * ============================
     */

    /**
     * Retorna IDs dos barbeiros que o usuário pode acessar
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
     * Verifica se pode ver agendamentos de um barbeiro
     */
    public function canViewBarberAgendamento(int $barbeiroId): bool
    {
        if ($this->isAdmin()) {
            return true;
        }

        $allowedBarbers = $this->getAllowedBarberIds();

        return in_array($barbeiroId, $allowedBarbers);
    }
        public function canLogin():  bool
    {
        if ($this->isAdmin() || $this->isVendedor()) {
            return true;
        }

        if ($this->isBarbeiro()) {
            return optional($this->barbeiro)->ativo === true;
        }

        return false;
}
}