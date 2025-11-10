<?php

namespace App\Filament\Resources\VitaminCategories\Pages;

use App\Filament\Resources\VitaminCategories\VitaminCategoryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewVitaminCategory extends ViewRecord
{
    protected static string $resource = VitaminCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
