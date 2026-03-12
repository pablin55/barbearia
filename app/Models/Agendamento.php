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
    ];

    /**
     * Opções de serviços disponíveis.
     */
    public static function getServiceOptions(): array
    {
        return [
            // Serviços Individuais
            'corte_simples' => ['name' => 'Corte Simples / Máquina', 'preco' => 19.90],
            'corte_social' => ['name' => 'Corte Social / Degradê / Surfista', 'preco' => 29.90],
            'corte_tesoura' => ['name' => 'Corte à Tesoura', 'preco' => 49.90],
            'corte_barba' => ['name' => 'Corte com Barba', 'preco' => 59.90],
            'corte_luzes' => ['name' => 'Corte + Luzes / Platinado', 'preco' => 99.90],
            'corte_pigmentacao' => ['name' => 'Corte com Pigmentação', 'preco' => 49.90],
            'barba' => ['name' => 'Barba', 'preco' => 29.90],
            'barba_pigmentacao' => ['name' => 'Barba com Pigmentação', 'preco' => 39.90],
            'corte_hidratacao' => ['name' => 'Corte + Hidratação', 'preco' => 49.90],
            'sobrancelha' => ['name' => 'Sobrancelha', 'preco' => 9.90],
            'colorimetria_corte' => ['name' => 'Colorimetria + Corte', 'preco' => 149.90],
            'corte_infantil' => ['name' => 'Corte Infantil', 'preco' => 39.90],
            
            // Planos Mensais
            'plano_corte_simples' => ['name' => 'Plano Corte Simples (Mensal)', 'preco' => 59.90],
            'plano_corte_normal' => ['name' => 'Plano Corte Normal (Mensal)', 'preco' => 99.90],
            'plano_corte_pigmentacao' => ['name' => 'Plano Corte + Pigmentação (Mensal)', 'preco' => 179.90],
            'plano_corte_infantil' => ['name' => 'Plano Corte Infantil (Mensal)', 'preco' => 139.90],
            'plano_barba' => ['name' => 'Plano Barba (Mensal)', 'preco' => 99.90],
            'plano_sobrancelha' => ['name' => 'Plano Sobrancelha (Mensal)', 'preco' => 29.90],
            'plano_cabelo_barba' => ['name' => 'Plano Cabelo + Barba (Mensal)', 'preco' => 219.90],
            'plano_corte_tesoura' => ['name' => 'Plano Corte Tesoura (Mensal)', 'preco' => 180.00],
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
        return $services[$this->servico]['preco'] ?? 0;
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