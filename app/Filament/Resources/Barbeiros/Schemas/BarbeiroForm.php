<?php

namespace App\Filament\Resources\Barbeiros\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BarbeiroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informações Pessoais')
                    ->description('Dados básicos do barbeiro')
                    ->icon('heroicon-o-user')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('nome')
                                ->label('Nome Completo')
                                ->required()
                                ->maxLength(255)
                                ->placeholder('Ex: João Silva'),

                            TextInput::make('telefone')
                                ->label('Telefone/WhatsApp')
                                ->tel()
                                ->prefixIcon('heroicon-o-phone')
                                ->placeholder('(11) 99999-9999'),
                        ]),
                    ]),

                Section::make('Foto e Apresentação')
                    ->description('Imagem e descrição profissional')
                    ->icon('heroicon-o-camera')
                    ->schema([
                        Grid::make(2)->schema([
                            FileUpload::make('foto')
                                ->label('Foto do Barbeiro')
                                ->disk('public')
                                ->directory('barbeiros')
                                ->visibility('public'),

                            Grid::make(1)->schema([
                                TextInput::make('especialidade')
                                    ->label('Especialidade')
                                    ->placeholder('Ex: Cortes, Barba, Coloração')
                                    ->helperText('Principais habilidades'),

                                TextInput::make('anos_experiencia')
                                    ->label('Anos de Experiência')
                                    ->numeric()
                                    ->minValue(0)
                                    ->maxValue(50)
                                    ->placeholder('Ex: 5'),
                            ]),
                        ]),

                        Textarea::make('bio')
                            ->label('Biografia')
                            ->rows(3)
                            ->maxLength(500)
                            ->placeholder('Conte um pouco sobre sua experiência e estilo...'),
                    ]),

                Section::make('Redes Sociais')
                    ->description('Links para redes sociais profissionais')
                    ->icon('heroicon-o-share')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('instagram')
                                ->label('Instagram')
                                ->prefix('@')
                                ->placeholder('joaobarbeiro')
                                ->prefixIcon('heroicon-o-link'),

                            TextInput::make('facebook')
                                ->label('Facebook')
                                ->placeholder('https://facebook.com/joaobarbeiro')
                                ->prefixIcon('heroicon-o-link'),
                        ]),
                    ]),

                Section::make('Status')
                    ->description('Configurações de disponibilidade')
                    ->icon('heroicon-o-check-circle')
                    ->schema([
                        Toggle::make('ativo')
                            ->label('Barbeiro Ativo')
                            ->default(true)
                            ->helperText('Desative para temporariamente indisponibilizar o barbeiro'),
                    ]),
            ]);
    }
}