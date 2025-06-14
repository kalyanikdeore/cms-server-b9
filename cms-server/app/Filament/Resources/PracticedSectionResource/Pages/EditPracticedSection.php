<?php

namespace App\Filament\Resources\PracticedSectionResource\Pages;

use App\Filament\Resources\PracticedSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPracticedSection extends EditRecord
{
    protected static string $resource = PracticedSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
