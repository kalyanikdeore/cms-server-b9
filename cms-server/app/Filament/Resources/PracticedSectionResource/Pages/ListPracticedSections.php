<?php

namespace App\Filament\Resources\PracticedSectionResource\Pages;

use App\Filament\Resources\PracticedSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPracticedSections extends ListRecords
{
    protected static string $resource = PracticedSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
