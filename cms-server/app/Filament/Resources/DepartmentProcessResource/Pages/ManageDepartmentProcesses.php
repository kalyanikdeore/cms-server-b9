<?php

namespace App\Filament\Resources\DepartmentProcessResource\Pages;

use App\Filament\Resources\DepartmentProcessResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDepartmentProcesses extends ManageRecords
{
    protected static string $resource = DepartmentProcessResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
