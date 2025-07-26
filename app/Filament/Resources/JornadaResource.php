<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JornadaResource\Pages;
use App\Filament\Resources\JornadaResource\RelationManagers;
use App\Models\Jornada;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JornadaResource extends Resource
{
    protected static ?string $model = Jornada::class;

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
            'index' => Pages\ListJornadas::route('/'),
            'create' => Pages\CreateJornada::route('/create'),
            'edit' => Pages\EditJornada::route('/{record}/edit'),
        ];
    }
}
