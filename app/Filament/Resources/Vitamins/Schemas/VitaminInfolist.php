<?php

namespace App\Filament\Resources\Vitamins\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class VitaminInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('slug'),
                TextEntry::make('category.name')
                    ->label('Category'),
                TextEntry::make('alternative_name')
                    ->placeholder('-'),
                TextEntry::make('description')
                    ->columnSpanFull(),
                TextEntry::make('functions')
                    ->columnSpanFull(),
                TextEntry::make('food_sources')
                    ->columnSpanFull(),
                TextEntry::make('daily_need'),
                TextEntry::make('deficiency_symptoms')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('toxicity_symptoms')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('interesting_facts')
                    ->placeholder('-')
                    ->columnSpanFull(),
                ImageEntry::make('image_path')
                    ->placeholder('-'),
                IconEntry::make('is_popular')
                    ->boolean(),
                TextEntry::make('order')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
