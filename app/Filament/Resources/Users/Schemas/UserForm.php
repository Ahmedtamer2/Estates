<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('Name'))
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label(__('Email Address'))
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                DateTimePicker::make('email_verified_at')
                    ->label(__('Email Verified At'))
                    ->disabled(),

                TextInput::make('password')
                    ->label(__('Password'))
                    ->password()
                    ->required(fn(string $context): bool => $context === 'create')
                    ->minLength(8),
            ]);
    }
}
