<?php

namespace App\Filament\Resources\WhyB9ConceptResource\Pages;

use App\Filament\Resources\WhyB9ConceptResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWhyB9Concept extends EditRecord
{
    protected static string $resource = WhyB9ConceptResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
