<?php

namespace App\Filament\Resources\Beritas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BeritaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required(),
                TextInput::make('ringkasan')
                    ->required(),
                TextInput::make('gambar'),
                Textarea::make('isi')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('wartawan_id')
                    ->required()
                    ->numeric(),
                TextInput::make('kategori_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
