<?php

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class ContactInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make(__('Contact Details'))
                    ->schema([
                        TextEntry::make('name')
                            ->label(__('Name'))
                            ->icon('heroicon-o-user'),

                        TextEntry::make('email')
                            ->label(__('Email'))
                            ->icon('heroicon-o-envelope'),

                        TextEntry::make('phone')
                            ->label(__('Phone'))
                            ->icon('heroicon-o-phone'),

                        TextEntry::make('address')
                            ->label(__('Address'))
                            ->icon('heroicon-o-map-pin'),

                        TextEntry::make('subject')
                            ->label(__('Subject'))
                            ->icon('heroicon-o-document-text'),

                        TextEntry::make('message')
                            ->label(__('Message'))
                            ->listWithLineBreaks(),
                    ])
                    ->columns(2),
            ]);
    }
}
