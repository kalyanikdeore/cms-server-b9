<?php

namespace App\Filament\Resources\TherapyFeatureResource\Pages;

use App\Filament\Resources\TherapyFeatureResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTherapyFeature extends EditRecord
{
    protected static string $resource = TherapyFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
