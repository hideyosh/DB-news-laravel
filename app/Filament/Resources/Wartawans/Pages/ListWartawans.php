<?php

namespace App\Filament\Resources\Wartawans\Pages;

use App\Filament\Resources\Wartawans\WartawanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWartawans extends ListRecords
{
    protected static string $resource = WartawanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
