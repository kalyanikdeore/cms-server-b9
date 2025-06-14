<?php

namespace App\Filament\Resources\ValueSectionResource\Pages;

use App\Filament\Resources\ValueSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListValueSections extends ListRecords
{
    protected static string $resource = ValueSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
