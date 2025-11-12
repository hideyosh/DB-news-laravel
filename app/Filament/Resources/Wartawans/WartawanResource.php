<?php

namespace App\Filament\Resources\Wartawans;

use App\Filament\Resources\Wartawans\Pages\CreateWartawan;
use App\Filament\Resources\Wartawans\Pages\EditWartawan;
use App\Filament\Resources\Wartawans\Pages\ListWartawans;
use App\Filament\Resources\Wartawans\Schemas\WartawanForm;
use App\Filament\Resources\Wartawans\Tables\WartawansTable;
use App\Models\Wartawan;
use BackedEnum;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Form;
use Filament\Tables\Columns\TextColumn;

class WartawanResource extends Resource
{
    protected static ?string $model = Wartawan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'App\Models\Wartawan';

    public static function form(Schema $schema): Schema
    {
          return $schema
            ->schema([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama')
                    ->placeholder('Masukkan nama wartawan')
                    ->helperText('Maksimal 255 karakter'),
                TextInput::make('email')
                    ->required()
                    ->email()
                    ->label('Email')
                    ->placeholder('Masukkan email wartawan')
                    ->helperText('Masukkan alamat email yang valid'),
            ]);
    }

    public static function table(Table $table): Table
    {
         return $table
            ->columns([
                TextColumn::make('nama')->label('Nama')->sortable()->searchable(),
                TextColumn::make('email')->label('Email')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWartawans::route('/'),
            'create' => CreateWartawan::route('/create'),
            'edit' => EditWartawan::route('/{record}/edit'),
        ];
    }
}
