<?php

namespace App\Filament\Resources\Agendamentos\Pages;

use App\Filament\Resources\Agendamentos\AgendamentoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAgendamentos extends ListRecords
{
    protected static string $resource = AgendamentoResource::class;

    protected function getHeaderActions(): array
    {
        $actions = [];

        // Somente admin vê o botão "New Agendamento"
        if (auth()->user()?->role === 'admin') {
            $actions[] = CreateAction::make();
        }

        return $actions;
    }
}