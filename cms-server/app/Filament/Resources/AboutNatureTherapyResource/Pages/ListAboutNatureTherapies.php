<?php

namespace App\Filament\Resources\AboutNatureTherapyResource\Pages;

use App\Filament\Resources\AboutNatureTherapyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAboutNatureTherapies extends ListRecords
{
    protected static string $resource = AboutNatureTherapyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
