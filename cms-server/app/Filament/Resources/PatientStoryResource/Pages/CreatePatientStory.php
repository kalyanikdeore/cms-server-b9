<?php

namespace App\Filament\Resources\PatientStoryResource\Pages;

use App\Filament\Resources\PatientStoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePatientStory extends CreateRecord
{
    protected static string $resource = PatientStoryResource::class;
}
