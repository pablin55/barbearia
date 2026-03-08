<?php

namespace App\Filament\Resources\Agendamentos;

use App\Filament\Resources\Agendamentos\Pages\CreateAgendamento;
use App\Filament\Resources\Agendamentos\Pages\EditAgendamento;
use App\Filament\Resources\Agendamentos\Pages\ListAgendamentos;
use App\Filament\Resources\Agendamentos\Pages\ViewAgendamento;
use App\Filament\Resources\Agendamentos\Schemas\AgendamentoForm;
use App\Filament\Resources\Agendamentos\Schemas\AgendamentoInfolist;
use App\Filament\Resources\Agendamentos\Tables\AgendamentosTable;
use App\Filament\Resources\Agendamentos\Tables\AgendamentosBarbeiroTable;
use App\Models\Agendamento;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AgendamentoResource extends Resource
{
    protected static ?string $model = Agendamento::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendarDays;

    protected static ?string $navigationLabel = 'Agendamentos';

    protected static ?string $pluralModelLabel = 'Agendamentos';

    protected static ?string $modelLabel = 'Agendamento';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'nome_cliente';

    public static function form(Schema $schema): Schema
    {
        return AgendamentoForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AgendamentoInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        // Se for barbeiro, usa a tabela otimizada para barbeiros
        $role = auth()->user()?->role;
        
        if ($role === 'barbeiro') {
            return AgendamentosBarbeiroTable::configure($table);
        }

        // Admin e vendedor usam a mesma tabela
        return AgendamentosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAgendamentos::route('/'),
            'create' => CreateAgendamento::route('/create'),
            'view' => ViewAgendamento::route('/{record}'),
            'edit' => EditAgendamento::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        $user = auth()->user();

        if (!$user) {
            return $query;
        }

        // Se for barbeiro, mostra apenas os agendamentos dele
        if ($user->role === 'barbeiro' && $user->barbeiro_id) {
            $query->where('barbeiro_id', $user->barbeiro_id);
        }

        // Se for vendedor, mostra apenas os agendamentos dos barbeiros atribuidos
        if ($user->role === 'vendedor' && $user->barbeiros) {
            $query->whereIn('barbeiro_id', $user->barbeiros);
        }

        return $query;
    }
}