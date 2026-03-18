<?php

namespace App\Filament\Resources\Faturamentos;

use App\Filament\Resources\Faturamentos\Pages\CreateFaturamento;
use App\Filament\Resources\Faturamentos\Pages\EditFaturamento;
use App\Filament\Resources\Faturamentos\Pages\ListFaturamentos;
use App\Filament\Resources\Faturamentos\Pages\ViewFaturamento;
use App\Filament\Resources\Faturamentos\Schemas\FaturamentoForm;
use App\Filament\Resources\Faturamentos\Schemas\FaturamentoInfolist;
use App\Filament\Resources\Faturamentos\Tables\FaturamentosTable;
use App\Models\Faturamento;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class FaturamentoResource extends Resource
{
    public static function  getNavigationGroup(): ?string
{ 
    return 'Gestão da Barbearia';
}
    protected static ?string $model = Faturamento::class;
    

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ChartBar;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    

    protected static ?string $recordTitleAttribute = 'faturamento';

    public static function form(Schema $schema): Schema
    {
        return FaturamentoForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FaturamentoInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FaturamentosTable::configure($table);
    }




    // ✅ ADICIONE ESTE MÉTODO: Controla se o menu aparece no sidebar
    public static function canViewAny(): bool
    {
        return auth()->user()->role === 'admin';
    }

    public static function canCreate(): bool
    {
        return auth()->user()->role === 'admin';
    }

    public static function canEdit($record): bool
    {
        return auth()->user()->role === 'admin';
    }

    public static function canDelete($record): bool
    {
        return auth()->user()->role === 'admin';
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFaturamentos::route('/'),
            'create' => CreateFaturamento::route('/create'),
            'view' => ViewFaturamento::route('/{record}'),
            'edit' => EditFaturamento::route('/{record}/edit'),
        ];
    }

public static function getEloquentQuery(): Builder
{
    $query = parent::getEloquentQuery();

    if (auth()->user()->role === 'barbeiro') {
        $query->where('barbeiro_id', auth()->user()->barbeiro_id);
    }

    return $query;
}
}