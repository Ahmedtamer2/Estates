<?php

namespace App\Filament\Resources\Blogs\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;

class BlogsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                 ImageColumn::make('image')
                    ->label(__('Image'))
                    ->rounded(),

                TextColumn::make('title')
                    ->label(__('Title'))
                    ->searchable()
                    ->limit(50)
                    ->sortable(),

                TextColumn::make('description')
                    ->label(__('Description'))
                    ->limit(50),

                TextColumn::make('created_at')
                    ->label(__('created_at'))
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
               
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
