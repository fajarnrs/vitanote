<?php

namespace App\Filament\Resources\Vitamins\Pages;

use App\Filament\Resources\Vitamins\VitaminResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewVitamin extends ViewRecord
{
    protected static string $resource = VitaminResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
