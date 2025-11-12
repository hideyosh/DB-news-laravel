<?php

namespace App\Filament\Resources\Wartawans\Pages;

use App\Filament\Resources\Wartawans\WartawanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditWartawan extends EditRecord
{
    protected static string $resource = WartawanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
