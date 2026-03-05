<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Cria a tabela de agendamentos com colunas em português
     */
    public function up(): void
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            
            // Informações do cliente
            $table->string('nome_cliente'); // Nome do cliente
            $table->string('telefone'); // Telefone
            $table->string('email')->nullable(); // E-mail (opcional)
            
            // Informações do serviço
            $table->string('servico'); // Tipo de serviço (simple_cut, social_cut, etc.)
            $table->decimal('preco', 10, 2); // Preço do serviço
            
            // Informações do barbeiro (opcional)
            $table->string('barbeiro')->nullable(); // Barbeiro escolhido pelo cliente
            
            // Data e horário do agendamento
            $table->date('data_agendamento'); // Data do agendamento
            $table->time('horario_agendamento'); // Horário do agendamento
            
            // Status do agendamento
            $table->enum('status', [
                'pending',      // Pendente (aguardando confirmação)
                'confirmed',    // Confirmado
                'completed',    // Concluído
                'cancelled',    // Cancelado
                'no_show'       // Não compareceu
            ])->default('pending');
            
            // Informações de pagamento
            $table->string('forma_pagamento')->nullable(); // Forma de pagamento
            $table->enum('status_pagamento', [
                'pending',      // Pendente
                'paid',         // Pago
                'failed',       // Falhou
                'refunded'      // Estornado
            ])->default('pending');
            $table->string('stripe_payment_id')->nullable(); // ID do pagamento Stripe
            $table->decimal('valor_pago', 10, 2)->nullable(); // Valor pago
            
            // Observações
            $table->text('observacoes')->nullable(); // Observações do cliente
            
            // Campos de controle
            $table->timestamps();
            
            // Índice para buscas
            $table->index(['data_agendamento', 'horario_agendamento']);
            $table->index('status');
            $table->index('status_pagamento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};

