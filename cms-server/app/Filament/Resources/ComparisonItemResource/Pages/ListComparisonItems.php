<?php

namespace App\Filament\Resources\ComparisonItemResource\Pages;

use App\Filament\Resources\ComparisonItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListComparisonItems extends ListRecords
{
    protected static string $resource = ComparisonItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
