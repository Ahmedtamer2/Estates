<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make(__('Blog Information'))
                    ->schema([
                        TextInput::make('title')
                            ->label(__('Title'))
                            ->required()
                            ->maxLength(50),

                        Textarea::make('description')
                            ->label(__('Description'))
                            ->rows(4)
                            ->required(),

                        FileUpload::make('image')
                            ->label(__('Image'))
                            ->image()
                            ->directory('blogs'),

                    ])
                    ->columns(1),
            ]);
    }
}
