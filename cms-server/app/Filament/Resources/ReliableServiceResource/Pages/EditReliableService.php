<?php

namespace App\Filament\Resources\ReliableServiceResource\Pages;

use App\Filament\Resources\ReliableServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReliableService extends EditRecord
{
    protected static string $resource = ReliableServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
