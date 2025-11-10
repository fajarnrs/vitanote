<?php

namespace App\Filament\Resources\VitaminCategories;

use App\Filament\Resources\VitaminCategories\Pages\CreateVitaminCategory;
use App\Filament\Resources\VitaminCategories\Pages\EditVitaminCategory;
use App\Filament\Resources\VitaminCategories\Pages\ListVitaminCategories;
use App\Filament\Resources\VitaminCategories\Pages\ViewVitaminCategory;
use App\Filament\Resources\VitaminCategories\Schemas\VitaminCategoryForm;
use App\Filament\Resources\VitaminCategories\Schemas\VitaminCategoryInfolist;
use App\Filament\Resources\VitaminCategories\Tables\VitaminCategoriesTable;
use App\Models\VitaminCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VitaminCategoryResource extends Resource
{
    protected static ?string $model = VitaminCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'vitamin model';

    public static function form(Schema $schema): Schema
    {
        return VitaminCategoryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return VitaminCategoryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VitaminCategoriesTable::configure($table);
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
            'index' => ListVitaminCategories::route('/'),
            'create' => CreateVitaminCategory::route('/create'),
            'view' => ViewVitaminCategory::route('/{record}'),
            'edit' => EditVitaminCategory::route('/{record}/edit'),
        ];
    }
}
