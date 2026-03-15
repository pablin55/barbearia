<?php

namespace App\Filament\Resources\Faturamentos\Pages;

use App\Filament\Resources\Faturamentos\FaturamentoResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFaturamento extends ViewRecord
{
    protected static string $resource = FaturamentoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
