<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->disabled()
                    ->dehydrated()
                    ->unique(ignoreRecord: true),
                Textarea::make('excerpt')
                    ->default(null)
                    ->columnSpanFull(),
                RichEditor::make('content')
                    ->required()
                    ->toolbarButtons([
                        'bold', 'italic', 'underline', 'strike',
                        'h2', 'h3',
                        'bulletList', 'orderedList',
                        'blockquote', 'codeBlock', 'link',
                        'undo', 'redo',
                    ])
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('articles/content')
                    ->columnSpanFull(),
                Repeater::make('references')
                    ->label('Referensi')
                    ->schema([
                        TextInput::make('source')
                            ->label('Sumber')
                            ->required()
                            ->placeholder('Contoh: WHO'),
                        TextInput::make('year')
                            ->label('Tahun')
                            ->numeric()
                            ->placeholder('Contoh: 2022'),
                        TextInput::make('url')
                            ->label('URL (Opsional)')
                            ->url()
                            ->placeholder('https://...'),
                    ])
                    ->defaultItems(0)
                    ->collapsible()
                    ->columnSpanFull()
                    ->itemLabel(fn (array $state): ?string => $state['source'] ?? null),
                FileUpload::make('featured_image')
                    ->image()
                    ->disk('public')
                    ->directory('articles/featured'),
                Select::make('author_id')
                    ->relationship('author', 'name')
                    ->required(),
                Toggle::make('is_published')
                    ->required(),
                DateTimePicker::make('published_at'),
                TextInput::make('views')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
