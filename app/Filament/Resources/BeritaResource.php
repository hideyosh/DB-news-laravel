<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Berita;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BeritaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BeritaResource\RelationManagers;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-Newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Detail Berita')
                    ->schema([
                        Select::make('wartawan_id')
                            ->label('Wartawan')
                            ->relationship('wartawan', 'nama')
                            ->preload()
                            ->required(),
                        Select::make('kategori_id')
                            ->label('Kategori')
                            ->relationship('kategori', 'nama_kategori')
                            ->preload()
                            ->required(),
                        TextInput::make('judul')
                            ->label('Judul Berita')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('ringkasan')
                            ->label('Ringkasan')
                            ->required()
                            ->maxLength(255),
                        RichEditor::make('isi')
                            ->label('Isi Berita')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('wartawan.nama')->label('Nama Wartawan')->searchable()->sortable(),
                TextColumn::make('kategori.nama_kategori')->label('Kategori')->searchable()->sortable(),
                TextColumn::make('judul')->label('Judul Berita')->searchable()->limit(25)->sortable(),
                TextColumn::make('ringkasan')->label('Ringkasan')->limit(25)->sortable(),
                TextColumn::make('isi')->label('Isi Berita')->limit(25)->sortable(),
                TextColumn::make('created_at')->label('Tanggal dibuat')->date('d M Y')->sortable(),
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
