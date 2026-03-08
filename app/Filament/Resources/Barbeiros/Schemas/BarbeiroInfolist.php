<?php

namespace App\Filament\Resources\Barbeiros\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Infolist;
use Filament\Schemas\Schema;

class BarbeiroInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informações Pessoais')
                    ->icon('heroicon-o-user')
                    ->schema([
                        Grid::make(3)->schema([
                            ImageEntry::make('foto_url')
                                ->label('Foto')
                                ->circular()
                                ->size(150),

                            Grid::make(1)->schema([
                                TextEntry::make('nome')
                                    ->label('Nome')
                                    ->weight('bold'),

                                TextEntry::make('telefone')
                                    ->label('Telefone')
                                    ->icon('heroicon-o-phone')
                                    ->copyable(),

                                TextEntry::make('anos_experiencia')
                                    ->label('Anos de Experiência')
                                    ->formatStateUsing(fn ($state) => $state ? "{$state} anos" : '-'),
                            ]),
                        ]),
                    ]),

                Section::make('Apresentação Profissional')
                    ->icon('heroicon-o-briefcase')
                    ->schema([
                        TextEntry::make('especialidade')
                            ->label('Especialidade')
                            ->badge()
                            ->color('primary'),

                        TextEntry::make('bio')
                            ->label('Biografia')
                            ->placeholder('Nenhuma biografia cadastrada...'),
                    ]),

                Section::make('Redes Sociais')
                    ->icon('heroicon-o-share')
                    ->schema([
                        Grid::make(2)->schema([
                            TextEntry::make('instagram')
                                ->label('Instagram')
                                ->icon('heroicon-o-link')
                                ->url(fn ($state) => $state ? "https://instagram.com/{$state}" : null),

                            TextEntry::make('facebook')
                                ->label('Facebook')
                                ->icon('heroicon-o-link')
                                ->url(fn ($state) => $state && str_starts_with($state, 'http') ? $state : null),
                        ]),
                    ]),

                Section::make('Status')
                    ->icon('heroicon-o-check-circle')
                    ->schema([
                        TextEntry::make('ativo')
                            ->label('Status')
                            ->badge()
                            ->colors([
                                'success' => true,
                                'danger' => false,
                            ])
                            ->formatStateUsing(fn ($state) => $state ? 'Ativo' : 'Inativo'),

                        TextEntry::make('created_at')
                            ->label('Data de Cadastro')
                            ->dateTime('d/m/Y H:i'),
                    ]),
            ]);
    }
}
