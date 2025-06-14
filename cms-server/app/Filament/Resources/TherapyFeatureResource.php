<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TherapyFeatureResource\Pages;
use App\Filament\Resources\TherapyFeatureResource\RelationManagers;
use App\Models\TherapyFeature;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TherapyFeatureResource extends Resource
{
    protected static ?string $model = TherapyFeature::class;
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $modelLabel = 'Therapy Feature';
    protected static ?string $navigationLabel = 'Therapy Features';
    protected static ?string $slug = 'therapy-features';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Feature Details')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('icon')
                            ->maxLength(255)
                            ->helperText('Enter Heroicon name (e.g., sparkles) or SVG path'),
                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                        Forms\Components\Toggle::make('is_active')
                            ->required()
                            ->default(true),
                    ]),
                
                Forms\Components\Section::make('Video Section')
                    ->schema([
                        Forms\Components\Toggle::make('has_video')
                            ->label('Include Video Section')
                            ->reactive(),
                        Forms\Components\TextInput::make('video_title')
                            ->maxLength(255)
                            ->hidden(fn ($get) => !$get('has_video')),
                        Forms\Components\Textarea::make('video_description')
                            ->columnSpanFull()
                            ->hidden(fn ($get) => !$get('has_video')),
                        Forms\Components\TextInput::make('youtube_url')
                            ->url()
                            ->maxLength(255)
                            ->helperText('Enter full YouTube URL')
                            ->hidden(fn ($get) => !$get('has_video')),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\IconColumn::make('has_video')
                    ->label('Has Video')
                    ->boolean(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
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
            ])
            ->reorderable('sort_order');
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
            'index' => Pages\ListTherapyFeatures::route('/'),
            'create' => Pages\CreateTherapyFeature::route('/create'),
            'edit' => Pages\EditTherapyFeature::route('/{record}/edit'),
        ];
    }
}