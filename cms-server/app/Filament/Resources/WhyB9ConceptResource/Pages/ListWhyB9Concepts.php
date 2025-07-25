<?php

namespace App\Filament\Resources\WhyB9ConceptResource\Pages;

use App\Filament\Resources\WhyB9ConceptResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWhyB9Concepts extends ListRecords
{
    protected static string $resource = WhyB9ConceptResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
