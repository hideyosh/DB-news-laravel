<?php

namespace App\Filament\Resources\Wartawans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class WartawanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
            ]);
    }
}
