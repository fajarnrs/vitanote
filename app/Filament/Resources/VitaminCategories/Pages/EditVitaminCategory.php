<?php

namespace App\Filament\Resources\VitaminCategories\Pages;

use App\Filament\Resources\VitaminCategories\VitaminCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditVitaminCategory extends EditRecord
{
    protected static string $resource = VitaminCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
