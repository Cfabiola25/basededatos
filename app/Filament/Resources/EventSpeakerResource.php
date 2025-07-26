<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventSpeakerResource\Pages;
use App\Filament\Resources\EventSpeakerResource\RelationManagers;
use App\Models\EventSpeaker;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventSpeakerResource extends Resource
{
    protected static ?string $model = EventSpeaker::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEventSpeakers::route('/'),
            'create' => Pages\CreateEventSpeaker::route('/create'),
            'edit' => Pages\EditEventSpeaker::route('/{record}/edit'),
        ];
    }
}
