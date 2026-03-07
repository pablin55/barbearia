<?php

namespace App\Filament\Resources\Barbeiros\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
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
                TextColumn::make('nome')->searchable(),
                TextColumn::make('telefone')->searchable(),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->recordActions($recordActions)
            ->toolbarActions($toolbarActions);
    }
}