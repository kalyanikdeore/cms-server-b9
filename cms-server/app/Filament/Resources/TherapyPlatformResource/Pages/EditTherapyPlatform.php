<?php

namespace App\Filament\Resources\TherapyPlatformResource\Pages;

use App\Filament\Resources\TherapyPlatformResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTherapyPlatform extends EditRecord
{
    protected static string $resource = TherapyPlatformResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
