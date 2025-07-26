<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SpeakerSocialResource\Pages;
use App\Filament\Resources\SpeakerSocialResource\RelationManagers;
use App\Models\SpeakerSocial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SpeakerSocialResource extends Resource
{
    protected static ?string $model = SpeakerSocial::class;

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
            'index' => Pages\ListSpeakerSocials::route('/'),
            'create' => Pages\CreateSpeakerSocial::route('/create'),
            'edit' => Pages\EditSpeakerSocial::route('/{record}/edit'),
        ];
    }
}
