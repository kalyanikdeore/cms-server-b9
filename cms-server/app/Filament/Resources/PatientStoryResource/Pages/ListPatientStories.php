<?php

namespace App\Filament\Resources\PatientStoryResource\Pages;

use App\Filament\Resources\PatientStoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPatientStories extends ListRecords
{
    protected static string $resource = PatientStoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
