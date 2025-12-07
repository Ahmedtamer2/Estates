<?php

namespace App\Filament\Resources\Estates\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;

class EstateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make(__('Basic Information'))
                    ->schema([
                        TextInput::make('name')
                            ->label(__('Name'))
                            ->required()
                            ->maxLength(255),

                        TextInput::make('price')
                            ->label(__('Price'))
                            ->numeric()
                            ->required(),

                        Select::make('operation_type')
                            ->label(__('Operation_type'))
                            ->options([
                                'rent' => __('rent'),
                                'sale' => __('sale'),
                            ])
                            ->required(),
                    ])
                    ->columns(1),

                Section::make(__('Property Details'))
                    ->schema([
                        TextInput::make('address')
                            ->label(__('Address'))
                            ->maxLength(255),

                        TextInput::make('area')
                            ->label(__('Area'))
                            ->numeric(),

                        TextInput::make('rooms')
                            ->label(__('Rooms'))
                            ->numeric(),

                        TextInput::make('bathrooms')
                            ->label(__('Bathrooms'))
                            ->numeric(),

                       
                    ])
                    ->columns(2), 
                      Section::make(__('Property Details'))
                    ->schema([
                      FileUpload::make('images')
                            ->label(__('Images'))
                            ->multiple()
                            ->image()
                            ->directory('estates'),

                        Textarea::make('description')
                            ->label(__('Description'))
                            ->rows(3),

                    ])
                    ->columns(2),
            ]);
    }
}
