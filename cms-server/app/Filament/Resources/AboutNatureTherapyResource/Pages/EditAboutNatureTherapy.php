<?php

namespace App\Filament\Resources\AboutNatureTherapyResource\Pages;

use App\Filament\Resources\AboutNatureTherapyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAboutNatureTherapy extends EditRecord
{
    protected static string $resource = AboutNatureTherapyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
