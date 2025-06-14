<?php

namespace App\Filament\Resources\AboutNatureTherapyResource\Pages;

use App\Filament\Resources\AboutNatureTherapyResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAboutNatureTherapy extends ViewRecord
{
    protected static string $resource = AboutNatureTherapyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
