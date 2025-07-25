<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NatureTherapyResource\Pages;
use App\Models\NatureTherapy;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;


class NatureTherapyResource extends Resource
{
    protected static ?string $model = NatureTherapy::class;
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                
                Forms\Components\TextInput::make('subtitle')
                    ->required()
                    ->maxLength(255),
                
                Forms\Components\FileUpload::make('background_image')
                    ->label('Image')
                    ->disk('public_uploads')
                    ->directory('nature-therapy')
                    ->getUploadedFileNameForStorageUsing(
                        function (TemporaryUploadedFile $file): string {
                            return 'nature-therapy-'.Str::random(10).'.'.$file->getClientOriginalExtension();
                        }
                    )
                    ->required()
                    ->columnSpanFull()
                    ->image()
                    ->imageEditor(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('background_image')
                    ->disk('public_uploads')
                    ->size(100),
                    
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('subtitle')
                    ->searchable(),
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
            'index' => Pages\ListNatureTherapies::route('/'),
            'create' => Pages\CreateNatureTherapy::route('/create'),
            'edit' => Pages\EditNatureTherapy::route('/{record}/edit'),
        ];
    }
}