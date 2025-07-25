<?php
// app/Filament/Resources/WhyB9ConceptResource.php

namespace App\Filament\Resources;

use App\Filament\Resources\WhyB9ConceptResource\Pages;
use App\Filament\Resources\WhyB9ConceptResource\RelationManagers;
use App\Models\WhyB9Concept;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WhyB9ConceptResource extends Resource
{
    protected static ?string $model = WhyB9Concept::class;
    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('icon')
                    ->options([
                        'Target' => 'Target',
                        'Brain' => 'Brain',
                        'Zap' => 'Zap',
                        'Globe' => 'Globe',
                        'Heart' => 'Heart',
                        'Shield' => 'Shield',
                    ])
                    ->required(),
                Forms\Components\Select::make('color_classes')
                    ->options([
                        'bg-indigo-100 text-indigo-600' => 'Indigo',
                        'bg-purple-100 text-purple-600' => 'Purple',
                        'bg-amber-100 text-amber-600' => 'Amber',
                        'bg-emerald-100 text-emerald-600' => 'Emerald',
                        'bg-red-100 text-red-600' => 'Red',
                        'bg-blue-100 text-blue-600' => 'Blue',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('is_active')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('icon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListWhyB9Concepts::route('/'),
            'create' => Pages\CreateWhyB9Concept::route('/create'),
            'edit' => Pages\EditWhyB9Concept::route('/{record}/edit'),
        ];
    }
}