<?php

namespace App\Filament\Resources\Barbeiros\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Table;

class BarbeirosTable
{
    public static function configure(Table $table): Table
    {
        $recordActions = [
            ViewAction::make(),
        ];

        if (auth()->user()?->role === 'admin') {
            $recordActions[] = EditAction::make();
        }

        $toolbarActions = [];

        if (auth()->user()?->role === 'admin') {
            $toolbarActions = [
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ];
        }

        return $table
            ->columns([
                ImageColumn::make('foto_url')
                    ->label('Foto')
                    ->circular()
                    ->size(50),

                TextColumn::make('nome')
                    ->label('Nome')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('telefone')
                    ->label('Telefone')
                    ->searchable()
                    ->icon('heroicon-o-phone')
                    ->copyable(),

                TextColumn::make('especialidade')
                    ->label('Especialidade')
                    ->searchable()
                    ->limit(30)
                    ->tooltip(function ($record) {
                        return $record->especialidade;
                    }),

                BadgeColumn::make('anos_experiencia')
                    ->label('Experiência')
                    ->colors([
                        'warning' => 0,
                        'info' => [1, 2, 3],
                        'success' => [4, 5, 6],
                        'primary' => fn ($state) => $state >= 7,
                    ])
                    ->formatStateUsing(fn ($state) => $state ? "{$state} anos" : '-'),

                BadgeColumn::make('ativo')
                    ->label('Status')
                    ->colors([
                        'success' => true,
                        'danger' => false,
                    ])
                    ->formatStateUsing(fn ($state) => $state ? 'Ativo' : 'Inativo'),

                TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->recordActions($recordActions)
            ->toolbarActions($toolbarActions)
            ->emptyStateIcon('heroicon-o-users')
            ->emptyStateHeading('Nenhum barbeiro encontrado')
            ->emptyStateDescription('Comece adicionando seu primeiro barbeiro.');
    }
}
