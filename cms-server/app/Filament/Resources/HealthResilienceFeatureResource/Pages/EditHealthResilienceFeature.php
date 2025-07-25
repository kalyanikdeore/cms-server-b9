<?php

namespace App\Filament\Resources\HealthResilienceFeatureResource\Pages;

use App\Filament\Resources\HealthResilienceFeatureResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHealthResilienceFeature extends EditRecord
{
    protected static string $resource = HealthResilienceFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
