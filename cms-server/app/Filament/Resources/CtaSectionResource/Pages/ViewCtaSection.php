<?php

namespace App\Filament\Resources\CtaSectionResource\Pages;

use App\Filament\Resources\CtaSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCtaSection extends ViewRecord
{
    protected static string $resource = CtaSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
