<?php

namespace App\Filament\Resources\TherapyServiceResource\Pages;

use App\Filament\Resources\TherapyServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTherapyService extends EditRecord
{
    protected static string $resource = TherapyServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
