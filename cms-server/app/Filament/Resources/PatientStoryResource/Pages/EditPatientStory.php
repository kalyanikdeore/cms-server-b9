<?php

namespace App\Filament\Resources\PatientStoryResource\Pages;

use App\Filament\Resources\PatientStoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPatientStory extends EditRecord
{
    protected static string $resource = PatientStoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
