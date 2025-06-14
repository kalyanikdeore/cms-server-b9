<?php

namespace App\Filament\Resources\NatureTherapyResource\Pages;

use App\Filament\Resources\NatureTherapyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNatureTherapy extends EditRecord
{
    protected static string $resource = NatureTherapyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
