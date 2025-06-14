<?php

namespace App\Filament\Resources\ValueSectionResource\Pages;

use App\Filament\Resources\ValueSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditValueSection extends EditRecord
{
    protected static string $resource = ValueSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
