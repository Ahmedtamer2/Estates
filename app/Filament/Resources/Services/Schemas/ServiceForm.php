<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make(__('Service Information'))
                    ->schema([
                        TextInput::make('name')
                            ->label(__('Service Name'))
                            ->required()
                            ->maxLength(255),

                        Textarea::make('description')
                            ->label(__('Description'))
                            ->required()
                            ->rows(4),

                        FileUpload::make('image')
                            ->label(__('Service Image'))
                            ->image()
                            ->directory('services')
                            ->required(),
                    ])
                    ->columns(1),
            ]);
    }
}
