<?php

namespace App\Filament\Resources\SpeakerSocialResource\Pages;

use App\Filament\Resources\SpeakerSocialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSpeakerSocial extends EditRecord
{
    protected static string $resource = SpeakerSocialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
