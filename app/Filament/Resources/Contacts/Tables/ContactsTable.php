<?php

namespace App\Filament\Resources\Contacts\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class ContactsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('Name'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label(__('Email'))
                    ->searchable(),

                TextColumn::make('phone')
                    ->label(__('Phone')),

                TextColumn::make('subject')
                    ->label(__('Subject'))
                    ->limit(50),

                TextColumn::make('message')
                    ->label(__('Message'))
                    ->limit(50)
                    ->searchable(),

                TextColumn::make('adress')
                    ->label(__('Address'))
                    ->limit(50),

            ])
            ->filters([
            ])
            ->recordActions([
                ViewAction::make(),
                DeleteAction::make(),
            ])
            ->striped()
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
