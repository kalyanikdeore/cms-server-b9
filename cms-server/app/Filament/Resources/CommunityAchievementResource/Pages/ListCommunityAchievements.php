<?php

namespace App\Filament\Resources\CommunityAchievementResource\Pages;

use App\Filament\Resources\CommunityAchievementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCommunityAchievements extends ListRecords
{
    protected static string $resource = CommunityAchievementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
