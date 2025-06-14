<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutSectionResource\Pages;
use App\Filament\Resources\AboutSectionResource\RelationManagers;
use App\Models\AboutSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutSectionResource extends Resource
{
    protected static ?string $model = AboutSection::class;
         protected static ?string $navigationGroup = 'About Us';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

 public static function form(Form $form): Form
{   
    return $form
        ->schema([
            Forms\Components\FileUpload::make('main_image')
                ->image()
                ->visibility('public')
                ->preserveFilenames()
                ->imageEditor()
                ->label('Main Image')
                ->required()
                ->disk('public_uploads')
                ->directory('about-section'),
            
            Forms\Components\FileUpload::make('scientist_image')
                ->label('Scientist Circle Image')
                ->required()
                ->image()
                ->circleCropper()
                ->disk('public_uploads')  // Added disk configuration
                ->directory('about-section'),
            
            Forms\Components\TextInput::make('title')
                ->required()
                ->maxLength(255),
            
            Forms\Components\RichEditor::make('content')
                ->required(),
            
            Forms\Components\TextInput::make('sort_order')
                ->numeric()
                ->default(0)
        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\ImageColumn::make('main_image')
                ->label('Image')
                ->disk('public_uploads')
                ->url(fn ($record) => asset('uploads/' . $record->main_image)),
            
            Tables\Columns\ImageColumn::make('scientist_image')
                ->disk('public_uploads')
                ->url(fn ($record) => asset('uploads/' . $record->scientist_image)),
            
            Tables\Columns\TextColumn::make('title')
                ->searchable(),
            
            Tables\Columns\TextColumn::make('sort_order')
                ->numeric()
                ->sortable(),
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
            'index' => Pages\ListAboutSections::route('/'),
            'create' => Pages\CreateAboutSection::route('/create'),
            'edit' => Pages\EditAboutSection::route('/{record}/edit'),
        ];
    }
}
