<?php

namespace App\Filament\Resources\Agendamentos\Schemas;

use App\Models\Barbeiro;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Hidden;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AgendamentoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Dados do Cliente')
                    ->description('Informações do cliente')
                    ->icon('heroicon-o-user')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('nome_cliente')
                                ->label('Nome do Cliente')
                                ->required()
                                ->prefixIcon('heroicon-o-user')
                                ->placeholder('Nome completo do cliente'),

                            TextInput::make('telefone')
                                ->label('Telefone/WhatsApp')
                                ->tel()
                                ->required()
                                ->prefixIcon('heroicon-o-phone')
                                ->placeholder('(11) 99999-9999'),
                        ]),

                        TextInput::make('email')
                            ->label('E-mail')
                            ->email()
                            ->prefixIcon('heroicon-o-envelope')
                            ->placeholder('cliente@email.com')
                            ->columnSpanFull(),
                    ]),

                Section::make('Serviço')
                    ->description('Detalhes do serviço agendado')
                    ->icon('heroicon-o-scissors')
                    ->schema([
                        Grid::make(2)->schema([
                            Select::make('servico')
                                ->label('Serviço')
                                ->required()
                                ->searchable()
                                ->options(function () {
                                    $services = \App\Models\Agendamento::getServiceOptions();
                                    $options = [];
                                    foreach ($services as $key => $service) {
                                        $options[$key] = $service['name'] . ' - R$ ' . number_format($service['price'], 2, ',', '.');
                                    }
                                    return $options;
                                })
                                ->helperText('Selecione o serviço desejado'),

                            Select::make('barbeiro')
                                ->label('Barbeiro')
                                ->options(function () {
                                    return Barbeiro::where('ativo', true)
                                        ->pluck('nome', 'nome')
                                        ->toArray();
                                })
                                ->helperText('Escolha o barbeiro de preferência')
                                ->afterStateUpdated(function ($state, $set) {
                                    // Quando selecionar o barbeiro, também define o barbeiro_id
                                    $barbeiro = Barbeiro::where('nome', $state)->first();
                                    if ($barbeiro) {
                                        $set('barbeiro_id', $barbeiro->id);
                                    }
                                })
                                ->reactive(),
                        ]),

                        // Campo hidden para armazenar o ID do barbeiro
                        \Filament\Forms\Components\Hidden::make('barbeiro_id'),

                        Grid::make(2)->schema([
                            TextInput::make('preco')
                                ->label('Valor')
                                ->required()
                                ->numeric()
                                ->prefix('R$')
                                ->prefixIcon('heroicon-o-currency-dollar')
                                ->placeholder('0,00'),

                            DatePicker::make('data_agendamento')
                                ->label('Data do Agendamento')
                                ->required()
                                ->native(false)
                                ->displayFormat('d/m/Y')
                                ->minDate(today()),
                        ]),

                        TimePicker::make('horario_agendamento')
                            ->label('Horário')
                            ->required()
                            ->native(false)
                            ->displayFormat('H:i')
                            ->seconds(false)
                            ->columnSpanFull(),
                    ]),

                Section::make('Status do Agendamento')
                    ->description('Acompanhamento do atendimento')
                    ->icon('heroicon-o-clock')
                    ->schema([
                        Grid::make(2)->schema([
                            Select::make('status')
                                ->label('Status')
                                ->required()
                                ->options([
                                    'pending' => '⏳ Pendente',
                                    'confirmed' => '✓ Confirmado',
                                    'completed' => '✅ Concluído',
                                    'cancelled' => '❌ Cancelado',
                                    'no_show' => '👻 Não Compareceu',
                                ])
                                ->default('pending'),

                            Select::make('status_pagamento')
                                ->label('Status do Pagamento')
                                ->required()
                                ->options([
                                    'pending' => '⏳ Pendente',
                                    'paid' => '✓ Pago',
                                    'failed' => '❌ Falhou',
                                    'refunded' => '↩️ Reembolsado',
                                ])
                                ->default('pending'),
                        ]),

                        Grid::make(2)->schema([
                            TextInput::make('forma_pagamento')
                                ->label('Forma de Pagamento')
                                ->placeholder('PIX, Dinheiro, Cartão...'),

                            TextInput::make('valor_pago')
                                ->label('Valor Pago')
                                ->numeric()
                                ->prefix('R$')
                                ->placeholder('0,00'),
                        ]),
                    ]),

                Section::make('Informações Adicionais')
                    ->description('Observações e configurações extras')
                    ->icon('heroicon-o-information-circle')
                    ->schema([
                        Textarea::make('observacoes')
                            ->label('Observações')
                            ->rows(3)
                            ->placeholder('Alguma observação importante sobre o agendamento...')
                            ->columnSpanFull(),

                        Toggle::make('pago')
                            ->label('Pagamento Recebido')
                            ->onIcon('heroicon-o-check-circle')
                            ->offIcon('heroicon-o-x-circle')
                            ->helperText('Marque quando o cliente efetivar o pagamento'),
                    ]),
            ]);
    }
}
