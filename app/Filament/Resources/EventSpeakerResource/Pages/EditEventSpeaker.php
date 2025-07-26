<?php

namespace App\Filament\Resources\EventSpeakerResource\Pages;

use App\Filament\Resources\EventSpeakerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventSpeaker extends EditRecord
{
    protected static string $resource = EventSpeakerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
