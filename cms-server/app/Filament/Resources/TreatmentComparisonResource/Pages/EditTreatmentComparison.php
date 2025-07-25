<?php

namespace App\Filament\Resources\TreatmentComparisonResource\Pages;

use App\Filament\Resources\TreatmentComparisonResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTreatmentComparison extends EditRecord
{
    protected static string $resource = TreatmentComparisonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
