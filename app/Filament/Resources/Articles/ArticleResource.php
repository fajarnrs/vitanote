<?php

namespace App\Filament\Resources\Articles;

use App\Filament\Resources\Articles\Pages\CreateArticle;
use App\Filament\Resources\Articles\Pages\EditArticle;
use App\Filament\Resources\Articles\Pages\ListArticles;
use App\Filament\Resources\Articles\Pages\ViewArticle;
use App\Filament\Resources\Articles\Schemas\ArticleForm;
use App\Filament\Resources\Articles\Schemas\ArticleInfolist;
use App\Filament\Resources\Articles\Tables\ArticlesTable;
use App\Models\Article;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'vitamin';

    public static function form(Schema $schema): Schema
    {
        return ArticleForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ArticleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ArticlesTable::configure($table);
    }

    /**
     * Limit operator to their own articles in the index/list.
     */
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        $user = Auth::user();
        if ($user && method_exists($user, 'isOperator') && $user->isOperator()) {
            $query->where('author_id', $user->id);
        }

        return $query;
    }

    // Authorization shortcuts consumed by Filament pages (EditRecord, CreateRecord, etc.)
    public static function canViewAny(): bool
    {
        $user = Auth::user();
        return $user?->isAdmin() || $user?->isOperator();
    }

    public static function canCreate(): bool
    {
        $user = Auth::user();
        return $user?->isAdmin() || $user?->isOperator();
    }

    public static function canEdit(Model $record): bool
    {
        $user = Auth::user();
        if (! $user) return false;
        if ($user->isAdmin()) return true;
        return $user->isOperator() && (int) $record->author_id === (int) $user->id;
    }

    public static function canDelete(Model $record): bool
    {
        $user = Auth::user();
        if (! $user) return false;
        if ($user->isAdmin()) return true;
        return $user->isOperator() && (int) $record->author_id === (int) $user->id;
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
            'index' => ListArticles::route('/'),
            'create' => CreateArticle::route('/create'),
            'view' => ViewArticle::route('/{record}'),
            'edit' => EditArticle::route('/{record}/edit'),
        ];
    }
}
