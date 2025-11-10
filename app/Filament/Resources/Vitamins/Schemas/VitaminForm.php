<?php

namespace App\Filament\Resources\Vitamins\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class VitaminForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->disabled()
                    ->dehydrated()
                    ->unique(ignoreRecord: true),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                TextInput::make('alternative_name')
                    ->default(null),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('functions')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('food_sources')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('daily_need')
                    ->required(),
                Textarea::make('deficiency_symptoms')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('toxicity_symptoms')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('interesting_facts')
                    ->default(null)
                    ->columnSpanFull(),
                Repeater::make('references')
                    ->label('Referensi')
                    ->schema([
                        TextInput::make('source')
                            ->label('Sumber')
                            ->required()
                            ->placeholder('Contoh: Kemenkes RI'),
                        TextInput::make('year')
                            ->label('Tahun')
                            ->numeric()
                            ->placeholder('Contoh: 2023'),
                        TextInput::make('url')
                            ->label('URL (Opsional)')
                            ->url()
                            ->placeholder('https://...'),
                    ])
                    ->defaultItems(0)
                    ->collapsible()
                    ->columnSpanFull()
                    ->itemLabel(fn (array $state): ?string => $state['source'] ?? null),
                FileUpload::make('image_path')
                    ->image(),
                Toggle::make('is_popular')
                    ->required(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
