<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CtaSectionResource\Pages;
use App\Filament\Resources\CtaSectionResource\RelationManagers;
use App\Models\CtaSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CtaSectionResource extends Resource
{
    protected static ?string $model = CtaSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    protected static ?string $navigationGroup = 'Page Sections';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('subtitle')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('badge_text')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('button_text')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('background_image')
                    ->image()
                    ->directory('cta-section')
                    ->required(),
                Forms\Components\FileUpload::make('overlay_image')
                    ->image()
                    ->directory('cta-section')
                    ->required(),
                Forms\Components\Textarea::make('disclaimer')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('results_note')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('badge_text')
                    ->searchable(),
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
            'index' => Pages\ListCtaSections::route('/'),
            'create' => Pages\CreateCtaSection::route('/create'),
            'edit' => Pages\EditCtaSection::route('/{record}/edit'),
        ];
    }
}