<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactSettingResource\Pages;
use App\Filament\Resources\ContactSettingResource\RelationManagers;
use App\Models\ContactSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactSettingResource extends Resource
{
    protected static ?string $model = ContactSetting::class;
    protected static ?string $navigationIcon = 'heroicon-o-phone';
    protected static ?string $modelLabel = 'Contact Settings';
    protected static ?string $navigationLabel = 'Contact Settings';
    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                    
                Forms\Components\Textarea::make('address')
                    ->required()
                    ->columnSpanFull(),
                    
                Forms\Components\TextInput::make('phone')
                    ->required()
                    ->maxLength(255),
                    
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                    
                Forms\Components\TextInput::make('working_hours')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('working_hours'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ContactSettingResource\Pages\ListContactSettings::route('/'),
            'create' => ContactSettingResource\Pages\CreateContactSetting::route('/create'),
            'edit' => ContactSettingResource\Pages\EditContactSetting::route('/{record}/edit'),
        ];
    }
}