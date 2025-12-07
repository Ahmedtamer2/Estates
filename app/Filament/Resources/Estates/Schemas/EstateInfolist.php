<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class EstateInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make(__('Basic Blog Information'))
                    ->schema([
                        TextEntry::make('title')
                            ->label(__('Title'))
                            ->icon('heroicon-o-document-text')
                            ->iconColor('primary')
                            ->size('lg')
                            ->weight('bold'),

                        TextEntry::make('description')
                            ->label(__('Description'))
                            ->listWithLineBreaks()
                            ->bulleted()
                            ->rows(4),

                        TextEntry::make('image')
                            ->label(__('Image'))
                            ->formatStateUsing(fn($state) => $state ? '<img src="' . asset('storage/' . $state) . '" style="max-width:150px; border-radius:8px;">' : __('No image'))
                            ->asHtml(),
                    ])
                    ->columns(2),

                Section::make(__('Additional Information'))
                    ->schema([
                        TextEntry::make('created_at')
                            ->label(__('Created At'))
                            ->dateTime('d/m/Y - h:i A')
                            ->icon('heroicon-o-plus-circle'),

                        TextEntry::make('updated_at')
                            ->label(__('Last Updated'))
                            ->dateTime('d/m/Y - h:i A')
                            ->icon('heroicon-o-arrow-path')
                            ->since(),
                    ])
                    ->columns(2)
                    ->collapsed(),
            ]);
    }
}
