<?php

namespace App\Filament\Resources\Barbeiros;

use App\Filament\Resources\Barbeiros\Pages\CreateBarbeiro;
use App\Filament\Resources\Barbeiros\Pages\EditBarbeiro;
use App\Filament\Resources\Barbeiros\Pages\ListBarbeiros;
use App\Filament\Resources\Barbeiros\Pages\ViewBarbeiro;
use App\Filament\Resources\Barbeiros\Schemas\BarbeiroForm;
use App\Filament\Resources\Barbeiros\Schemas\BarbeiroInfolist;
use App\Filament\Resources\Barbeiros\Tables\BarbeirosTable;
use App\Models\Barbeiro;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;

class BarbeiroResource extends Resource
{

public static function getNavigationGroup(): ?string
{
    return 'Atendimento';
}

public static function getNavigationSort(): ?int
{
    return 1; // ajusta a ordem dentro do grupo
}
    protected static ?string $model = Barbeiro::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static ?string $navigationLabel = 'Barbeiros';

    protected static ?string $pluralModelLabel = 'Barbeiros';

    protected static ?string $modelLabel = 'Barbeiro';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'nome';

    // TODOS podem ver o menu
    public static function canViewAny(): bool
    {
        return in_array(auth()->user()?->role, ['admin', 'barbeiro']);
    }

    // Apenas admin cria
    public static function canCreate(): bool
    {
        return auth()->user()?->role === 'admin';
    }

    // Apenas admin edita
    public static function canEdit($record): bool
    {
        return auth()->user()?->role === 'admin';
    }

    // Apenas admin exclui
    public static function canDelete($record): bool
    {
        return auth()->user()?->role === 'admin';
    }

    public static function form(Schema $schema): Schema
    {
        return BarbeiroForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BarbeiroInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        $table = BarbeirosTable::configure($table);

        // barbeiro não pode editar
        if (auth()->user()?->role !== 'admin') {
            $table = $table
                ->actions([])
                ->bulkActions([]);
        }

        return $table;
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListBarbeiros::route('/'),
            'create' => CreateBarbeiro::route('/create'),
            'view'   => ViewBarbeiro::route('/{record}'),
            'edit'   => EditBarbeiro::route('/{record}/edit'),
        ];
    }

    // 🔹 Carrega sempre o relacionamento user para mostrar email na tabela
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with(['user']);
    }
}