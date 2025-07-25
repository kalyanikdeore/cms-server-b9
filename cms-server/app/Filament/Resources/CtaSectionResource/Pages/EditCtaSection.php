<?php

namespace App\Filament\Resources\CtaSectionResource\Pages;

use App\Filament\Resources\CtaSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCtaSection extends EditRecord
{
    protected static string $resource = CtaSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
