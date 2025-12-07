<?php

namespace App\Filament\Resources\Estates\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;

class EstatesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('name'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('price')
                    ->label(__('price'))
                    ->sortable()
                    ->formatStateUsing(fn($state) => number_format($state) . ' ' . __('currency')),

                BadgeColumn::make('operation_type')
                    ->label(__('operation_type'))
                    ->formatStateUsing(fn($state) => match ($state) {
                        'rent' => __('rent'),
                        'sale' => __('sale'),
                        default => $state,
                    })
                    ->colors([
                        'primary' => 'rent',
                        'success' => 'sale',
                    ])
                    ->sortable(),

                TextColumn::make('address')
                    ->label(__('address'))
                    ->limit(30),

                TextColumn::make('area')
                    ->label(__('area'))
                    ->sortable()
                    ->suffix(' m²'),

                TextColumn::make('rooms')
                    ->label(__('rooms'))
                    ->sortable(),

                TextColumn::make('bathrooms')
                    ->label(__('bathrooms'))
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label(__('created_at'))
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
