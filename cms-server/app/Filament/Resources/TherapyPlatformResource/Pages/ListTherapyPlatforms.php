<?php

namespace App\Filament\Resources\TherapyPlatformResource\Pages;

use App\Filament\Resources\TherapyPlatformResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTherapyPlatforms extends ListRecords
{
    protected static string $resource = TherapyPlatformResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
