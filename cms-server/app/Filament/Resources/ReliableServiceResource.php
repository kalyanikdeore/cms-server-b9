<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReliableServiceResource\Pages;
use App\Filament\Resources\ReliableServiceResource\RelationManagers;
use App\Models\ReliableService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReliableServiceResource extends Resource
{
    protected static ?string $model = ReliableService::class;
    protected static ?string $navigationGroup = 'Home Page';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

   // In ReliableServiceResource.php
public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('title')
                ->required()
                ->maxLength(255),
            Forms\Components\Textarea::make('description')
                ->maxLength(65535)
                ->columnSpanFull(),
            Forms\Components\FileUpload::make('image_path')
                ->label('Service Image')
                ->directory('services') // This will store in storage/app/public/services
                ->image()
                ->required(),
            Forms\Components\ColorPicker::make('background_color')
                ->default('#ffffff'),
            Forms\Components\Toggle::make('is_active')
                ->required()
                ->default(true),
            Forms\Components\TextInput::make('order')
                ->required()
                ->numeric()
                ->default(0),
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
            'index' => Pages\ListReliableServices::route('/'),
            'create' => Pages\CreateReliableService::route('/create'),
            'edit' => Pages\EditReliableService::route('/{record}/edit'),
        ];
    }
}
