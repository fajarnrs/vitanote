<?php

namespace App\Filament\Resources\VitaminCategories\Pages;

use App\Filament\Resources\VitaminCategories\VitaminCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVitaminCategories extends ListRecords
{
    protected static string $resource = VitaminCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
