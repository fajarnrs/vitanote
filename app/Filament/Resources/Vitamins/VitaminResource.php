<?php

namespace App\Filament\Resources\Vitamins;

use App\Filament\Resources\Vitamins\Pages\CreateVitamin;
use App\Filament\Resources\Vitamins\Pages\EditVitamin;
use App\Filament\Resources\Vitamins\Pages\ListVitamins;
use App\Filament\Resources\Vitamins\Pages\ViewVitamin;
use App\Filament\Resources\Vitamins\Schemas\VitaminForm;
use App\Filament\Resources\Vitamins\Schemas\VitaminInfolist;
use App\Filament\Resources\Vitamins\Tables\VitaminsTable;
use App\Models\Vitamin;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VitaminResource extends Resource
{
    protected static ?string $model = Vitamin::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'vitamin';

    public static function form(Schema $schema): Schema
    {
        return VitaminForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return VitaminInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VitaminsTable::configure($table);
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
            'index' => ListVitamins::route('/'),
            'create' => CreateVitamin::route('/create'),
            'view' => ViewVitamin::route('/{record}'),
            'edit' => EditVitamin::route('/{record}/edit'),
        ];
    }
}
