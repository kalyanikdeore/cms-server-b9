<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PracticedSectionResource\Pages;
use App\Filament\Resources\PracticedSectionResource\RelationManagers;
use App\Models\PracticedSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PracticedSectionResource extends Resource
{
    protected static ?string $model = PracticedSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
            return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required(),
                Forms\Components\FileUpload::make('image_path')
                    ->directory('practiced-section')
                    ->image()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
           return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\ImageColumn::make('image_path'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
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
            'index' => Pages\ListPracticedSections::route('/'),
            'create' => Pages\CreatePracticedSection::route('/create'),
            'edit' => Pages\EditPracticedSection::route('/{record}/edit'),
        ];
    }
}
