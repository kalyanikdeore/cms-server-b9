<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TherapyPlatformResource\Pages;
use App\Filament\Resources\TherapyPlatformResource\RelationManagers;
use App\Models\TherapyPlatform;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TherapyPlatformResource extends Resource
{
    protected static ?string $model = TherapyPlatform::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    protected static ?string $navigationGroup = 'Content Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('tab_name')
                    ->options([
                        'technology' => 'Technology Integration',
                        'methods' => 'Therapeutic Methods',
                        'research' => 'Evidence-Based Research',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('feature_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('feature_description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('is_active')
                    ->required()
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tab_name')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'technology' => 'primary',
                        'methods' => 'success',
                        'research' => 'warning',
                        default => 'gray',
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('feature_name')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),
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
                Tables\Filters\SelectFilter::make('tab_name')
                    ->options([
                        'technology' => 'Technology Integration',
                        'methods' => 'Therapeutic Methods',
                        'research' => 'Evidence-Based Research',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order', 'asc');
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
            'index' => Pages\ListTherapyPlatforms::route('/'),
            'create' => Pages\CreateTherapyPlatform::route('/create'),
            'edit' => Pages\EditTherapyPlatform::route('/{record}/edit'),
        ];
    }
}