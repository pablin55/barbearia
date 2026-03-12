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
            $table->string('servico'); // Tipo de serviço (corte_simples, corte_social, etc.)
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
            
            // Observações
            $table->text('observacoes')->nullable(); // Observações do cliente
            
            // Campos de controle
            $table->timestamps();
            
            // Índice para buscas
            $table->index(['data_agendamento', 'horario_agendamento']);
            $table->index('status');
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

