<?php

namespace App\Filament\Resources\ApplicationTokens\Pages;

use App\Filament\Resources\ApplicationTokens\ApplicationTokenResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditApplicationToken extends EditRecord
{
    protected static string $resource = ApplicationTokenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
