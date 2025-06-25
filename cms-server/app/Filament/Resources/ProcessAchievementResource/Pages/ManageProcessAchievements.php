<?php

namespace App\Filament\Resources\ProcessAchievementResource\Pages;

use App\Filament\Resources\ProcessAchievementResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageProcessAchievements extends ManageRecords
{
    protected static string $resource = ProcessAchievementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
