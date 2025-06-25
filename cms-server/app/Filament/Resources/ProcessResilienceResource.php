<?php

namespace App\Filament\Resources;

use App\Models\ProcessResilience;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Filament\Resources\ProcessResilienceResource\Pages;

class ProcessResilienceResource extends Resource
{
    protected static ?string $model = ProcessResilience::class;
    protected static ?string $navigationIcon = 'heroicon-o-film';
    protected static ?string $modelLabel = 'Process Resilience';
    protected static ?string $navigationLabel = 'Process Resilience';
    protected static ?string $slug = 'process-resilience';

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
                    
                Forms\Components\FileUpload::make('video1')
                    ->label('First Video')
                    ->directory('process-resilience/videos')
                    ->acceptedFileTypes(['video/mp4'])
                    ->required()
                    ->columnSpanFull(),
                    
                Forms\Components\FileUpload::make('video2')
                    ->label('Second Video')
                    ->directory('process-resilience/videos')
                    ->acceptedFileTypes(['video/mp4'])
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
            'index' => Pages\ListProcessResiliences::route('/'),
            'create' => Pages\CreateProcessResilience::route('/create'),
            'edit' => Pages\EditProcessResilience::route('/{record}/edit'),
        ];
    }
}