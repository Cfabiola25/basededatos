<?php

namespace App\Filament\Resources\JornadaSpeakerResource\Pages;

use App\Filament\Resources\JornadaSpeakerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJornadaSpeakers extends ListRecords
{
    protected static string $resource = JornadaSpeakerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
