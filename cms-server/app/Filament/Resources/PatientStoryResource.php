<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatientStoryResource\Pages;
use App\Filament\Resources\PatientStoryResource\RelationManagers;
use App\Models\PatientStory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PatientStoryResource extends Resource
{
    protected static ?string $model = PatientStory::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';

    protected static ?string $navigationGroup = 'Content Management';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->required()
                ->maxLength(255),
            Forms\Components\Textarea::make('description')
                ->required()
                ->columnSpanFull(),
            Forms\Components\FileUpload::make('image')
                ->image()
                ->directory('patient-stories')
                ->disk('public_uploads')
                ->required(),
            Forms\Components\Toggle::make('is_featured')
                ->label('Is Featured?'),
            Forms\Components\TextInput::make('sort_order')
                ->numeric()
                ->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->disk('public_uploads')
                    ->url(fn ($record) => asset('uploads/' . $record->image)),
                Tables\Columns\ToggleColumn::make('is_featured'),
                Tables\Columns\TextColumn::make('sort_order')->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPatientStories::route('/'),
            'create' => Pages\CreatePatientStory::route('/create'),
            'edit' => Pages\EditPatientStory::route('/{record}/edit'),
        ];
    }
}