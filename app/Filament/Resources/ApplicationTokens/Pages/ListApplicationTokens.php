<?php

namespace App\Filament\Resources\ApplicationTokens\Pages;

use App\Filament\Resources\ApplicationTokens\ApplicationTokenResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListApplicationTokens extends ListRecords
{
    protected static string $resource = ApplicationTokenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
