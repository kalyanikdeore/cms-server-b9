<?php

namespace App\Filament\Resources\ProcessResilienceResource\Pages;

use App\Filament\Resources\ProcessResilienceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProcessResiliences extends ListRecords
{
    protected static string $resource = ProcessResilienceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
