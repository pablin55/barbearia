<?php

namespace App\Filament\Resources\Faturamentos\Pages;

use App\Filament\Resources\Faturamentos\FaturamentoResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditFaturamento extends EditRecord
{
    protected static string $resource = FaturamentoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
