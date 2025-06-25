<?php

namespace App\Filament\Resources\ProcessResilienceResource\Pages;

use App\Filament\Resources\ProcessResilienceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProcessResilience extends EditRecord
{
    protected static string $resource = ProcessResilienceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
