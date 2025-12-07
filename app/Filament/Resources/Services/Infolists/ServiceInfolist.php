<?php

namespace App\Filament\Resources\Services\Infolists;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ServiceInfolist
{
  public static function configure(Schema $schema): Schema
  {
    return $schema
      ->components([
        TextEntry::make('name')
          ->label(__('Service Name'))
          ->size('text-lg')
          ->weight('bold'),

        TextEntry::make('description')
          ->label(__('Description'))
          ->markdown()
          ->columnSpanFull(),

        TextEntry::make('image')
          ->label(__('Service Image'))
          ->formatStateUsing(fn($state) => $state ? '<img src="' . asset('storage/' . $state) . '" class="w-32 h-32 object-cover rounded">' : '<div class="w-32 h-32 bg-gray-200 rounded flex items-center justify-center">No Image</div>')
          ->html(),

        TextEntry::make('created_at')
          ->label(__('Created At'))
          ->dateTime()
          ->size('sm'),

        TextEntry::make('updated_at')
          ->label(__('Updated At'))
          ->dateTime()
          ->size('sm'),
      ]);
  }
}
