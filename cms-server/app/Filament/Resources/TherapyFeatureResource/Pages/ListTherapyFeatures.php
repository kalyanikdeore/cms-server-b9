<?php

namespace App\Filament\Resources\TherapyFeatureResource\Pages;

use App\Filament\Resources\TherapyFeatureResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTherapyFeatures extends ListRecords
{
    protected static string $resource = TherapyFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
