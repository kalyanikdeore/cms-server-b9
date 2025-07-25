<?php

namespace App\Filament\Resources\HealthResilienceFeatureResource\Pages;

use App\Filament\Resources\HealthResilienceFeatureResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHealthResilienceFeatures extends ListRecords
{
    protected static string $resource = HealthResilienceFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
