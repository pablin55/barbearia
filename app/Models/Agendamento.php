<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    /**
     * Nome da tabela
     */
    protected $table = 'agendamentos';

    /**
     * Os atributos que são atribuíveis em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome_cliente',
        'telefone',
        'email',
        'servico',
        'preco',
        'barbeiro',
        'data_agendamento',
        'horario_agendamento',
        'status',
        'forma_pagamento',
        'status_pagamento',
        'stripe_payment_id',
        'valor_pago',
        'observacoes',
    ];

    /**
     * Os atributos que devem ser convertidos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'data_agendamento' => 'date',
        'horario_agendamento' => 'datetime:H:i',
        'preco' => 'decimal:2',
        'valor_pago' => 'decimal:2',
    ];

    /**
     * Opções de serviços disponíveis.
     */
    public static function getServiceOptions(): array
    {
        return [
            // Serviços Individuais
            'simple_cut' => ['name' => 'Corte Simples / Máquina', 'price' => 19.90],
            'social_cut' => ['name' => 'Corte Social / Fade / Surfer', 'price' => 29.90],
            'scissor_cut' => ['name' => 'Corte Tesoura', 'price' => 49.90],
            'cut_beard' => ['name' => 'Corte com Barba', 'price' => 59.90],
            'cut_highlights' => ['name' => 'Corte + Luzes / Platinum', 'price' => 99.90],
            'cut_pigmentation' => ['name' => 'Corte com Pigmentação', 'price' => 49.90],
            'beard' => ['name' => 'Barba', 'price' => 29.90],
            'beard_pigmentation' => ['name' => 'Barba com Pigmentação', 'price' => 39.90],
            'cut_hydration' => ['name' => 'Corte + Hidratação', 'price' => 49.90],
            'eyebrow' => ['name' => 'Sobrancelha', 'price' => 9.90],
            'colorimetry_cut' => ['name' => 'Colorimetria + Corte', 'price' => 149.90],
            'children_cut' => ['name' => 'Corte Infantil', 'price' => 39.90],
            
            // Planos Mensais
            'simple_cut_plan' => ['name' => 'Plano Corte Simples (Mensal)', 'price' => 59.90],
            'normal_cut_plan' => ['name' => 'Plano Corte Normal (Mensal)', 'price' => 99.90],
            'cut_pigmentation_plan' => ['name' => 'Plano Corte + Pigmentação (Mensal)', 'price' => 179.90],
            'children_cut_plan' => ['name' => 'Plano Corte Infantil (Mensal)', 'price' => 139.90],
            'beard_plan' => ['name' => 'Plano Barba (Mensal)', 'price' => 99.90],
            'eyebrow_plan' => ['name' => 'Plano Sobrancelha (Mensal)', 'price' => 29.90],
            'hair_beard_plan' => ['name' => 'Plano Cabelo + Barba (Mensal)', 'price' => 219.90],
            'scissor_cut_plan' => ['name' => 'Plano Corte Tesoura (Mensal)', 'price' => 180.00],
        ];
    }

    /**
     * Opções de barbeiros disponíveis.
     */
    public static function getBarberOptions(): array
    {
        return [
            'pablo' => [
                'name' => 'Pablo Apolinario',
                'image' => 'img/pablo.jpeg',
                'role' => 'CEO & Fundador'
            ],
            'juan' => [
                'name' => 'Juan Pablo',
                'image' => 'img/juan1.jpeg',
                'role' => 'Barbeiro'
            ],
            'wesley' => [
                'name' => 'Wesley "WS"',
                'image' => 'img/wss.jpeg',
                'role' => 'Barbeiro'
            ],
            'vinicius' => [
                'name' => 'Vinícius "VN"',
                'image' => 'img/vnz.jpeg',
                'role' => 'Barbeiro'
            ],
            'any' => [
                'name' => 'Qualquer Barbeiro',
                'image' => 'img/barbearia.jpeg',
                'role' => 'Disponibilidade'
            ],
        ];
    }

    /**
     * Obtém o nome do serviço.
     */
    public function getServiceNameAttribute(): string
    {
        $services = self::getServiceOptions();
        return $services[$this->servico]['name'] ?? $this->servico;
    }

    /**
     * Obtém o preço do serviço.
     */
    public function getServicePriceAttribute(): float
    {
        $services = self::getServiceOptions();
        return $services[$this->servico]['price'] ?? 0;
    }

    /**
     * Obtém as informações do barbeiro.
     */
    public function getBarberInfoAttribute(): ?array
    {
        $barbers = self::getBarberOptions();
        return $barbers[$this->barbeiro] ?? null;
    }

    /**
     * Verifica se o agendamento pode ser cancelado.
     */
    public function canBeCancelled(): bool
    {
        return in_array($this->status, ['pending', 'confirmed']);
    }

    /**
     * Verifica se o agendamento pode ser confirmado.
     */
    public function canBeConfirmed(): bool
    {
        return $this->status === 'pending';
    }

    /**
     * Verifica se o pagamento foi realizado.
     */
    public function isPaid(): bool
    {
        return $this->status_pagamento === 'paid';
    }

    /**
     * Escopo para filtrar por data.
     */
    public function scopeByDate($query, $date)
    {
        return $query->where('data_agendamento', $date);
    }

    /**
     * Escopo para filtrar por status.
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Escopo para filtrar por barbeiro.
     */
    public function scopeByBarber($query, $barber)
    {
        return $query->where('barbeiro', $barber);
    }

    /**
     * Escopo para agendamentos pendentes.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Escopo para agendamentos de hoje.
     */
    public function scopeToday($query)
    {
        return $query->where('data_agendamento', now()->toDateString());
    }
}

