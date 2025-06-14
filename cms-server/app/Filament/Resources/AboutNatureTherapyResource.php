<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutNatureTherapyResource\Pages;
use App\Filament\Resources\AboutNatureTherapyResource\RelationManagers;
use App\Models\AboutNatureTherapy;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class AboutNatureTherapyResource extends Resource
{
    protected static ?string $model = AboutNatureTherapy::class;
     protected static ?string $navigationGroup = 'Home Page';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $sort = 2;

  public static function form(Form $form): Form
{
    return $form->schema([
        Forms\Components\TextInput::make('title')->maxLength(255),
        Forms\Components\TextInput::make('subtitle')->required()->maxLength(255),
        Forms\Components\RichEditor::make('description')->required()->columnSpanFull(),
        Forms\Components\TextInput::make('button_text')->default('Read more →'),
        Forms\Components\TextInput::make('button_link')->default('/process'),
        Forms\Components\FileUpload::make('video_path')
            ->directory('about-section-videos')
            ->acceptedFileTypes(['video/mp4'])
            ->maxSize(10240),
        // Removed video_thumbnail field
        Forms\Components\Toggle::make('is_active')->default(true),
      
    ]);
}

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('title')->searchable(),
            Tables\Columns\TextColumn::make('subtitle')->searchable(),
            Tables\Columns\IconColumn::make('is_active')->boolean(),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
        ])->actions([
            Tables\Actions\EditAction::make(),
        ])->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAboutNatureTherapies::route('/'),
            'create' => Pages\CreateAboutNatureTherapy::route('/create'),
            'edit' => Pages\EditAboutNatureTherapy::route('/{record}/edit'),
        ];
    }
}
