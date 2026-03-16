<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barbeiro extends Model
{
    protected $fillable = [
        'nome',
        'telefone',
        'foto',
        'especialidade',
        'bio',
        'instagram',
        'facebook',
        'anos_experiencia',
        'ativo',
    ];

    protected $casts = [
        'ativo' => 'boolean',
        'anos_experiencia' => 'integer',
    ];

    /**
     * Relação com agendamentos
     */
    public function agendamentos(): HasMany
    {
        return $this->hasMany(Agendamento::class);
    }

    /**
     * Relação com usuário (login)
     */
    public function user()
    {
        return $this->hasOne(\App\Models\User::class);
    }

    /**
     * Obtém o caminho completo da foto
     */
    public function getFotoUrlAttribute(): string
    {
        if (empty($this->foto)) {
            return asset('img/barbearia.jpeg');
        }
        
        return asset('storage/' . $this->foto);
    }

    /**
     * Obtém status formatado
     */
    public function getStatusLabelAttribute(): string
    {
        return $this->ativo ? 'Ativo' : 'Inativo';
    }

    /**
     * Escopo para barbeiros ativos
     */
    public function scopeAtivos($query)
    {
        return $query->where('ativo', true);
    }
}