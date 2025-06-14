<?php

namespace App\Filament\Resources\NatureTherapyResource\Pages;

use App\Filament\Resources\NatureTherapyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNatureTherapies extends ListRecords
{
    protected static string $resource = NatureTherapyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
