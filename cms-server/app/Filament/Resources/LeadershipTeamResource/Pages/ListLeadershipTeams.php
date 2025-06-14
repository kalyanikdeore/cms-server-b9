<?php

namespace App\Filament\Resources\LeadershipTeamResource\Pages;

use App\Filament\Resources\LeadershipTeamResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLeadershipTeams extends ListRecords
{
    protected static string $resource = LeadershipTeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
