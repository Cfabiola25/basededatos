<?php

namespace App\Filament\Resources\JornadaSpeakerResource\Pages;

use App\Filament\Resources\JornadaSpeakerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJornadaSpeaker extends EditRecord
{
    protected static string $resource = JornadaSpeakerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
