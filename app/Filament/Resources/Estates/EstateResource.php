<?php

namespace App\Filament\Resources\Estates;

use App\Filament\Resources\Blogs\Pages\ViewEstaes;
use App\Filament\Resources\Estates\Pages\CreateEstate;
use App\Filament\Resources\Estates\Pages\EditEstate;
use App\Filament\Resources\Estates\Pages\ListEstates;
use App\Filament\Resources\Estates\Schemas\EstateForm;
use App\Filament\Resources\Estates\Tables\EstatesTable;
use App\Models\Estate;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Support\Icons\Heroicon;
use BackedEnum;

class EstateResource extends Resource
{
    protected static ?string $model = Estate::class;
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-office';
    public static function getNavigationLabel(): string
    {
        return __('Estates');
    }

    public static function form(Schema $schema): Schema
    {
        return EstateForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EstatesTable::configure($table);
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
            'index' => ListEstates::route('/'),
            'create' => CreateEstate::route('/create'),
            'view' => ViewEstaes::route('/{record}'),
            'edit' => EditEstate::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Estates');
    }
}
