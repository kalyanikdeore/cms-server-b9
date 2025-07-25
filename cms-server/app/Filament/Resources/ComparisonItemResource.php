<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComparisonItemResource\Pages;
use App\Filament\Resources\ComparisonItemResource\RelationManagers;
use App\Models\ComparisonItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class ComparisonItemResource extends Resource
{
    protected static ?string $model = ComparisonItem::class;
    protected static ?string $navigationIcon = 'heroicon-o-scale';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('feature')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                
                Forms\Components\TextInput::make('traditional')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                
                Forms\Components\TextInput::make('b9')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                
                Forms\Components\Toggle::make('show_icons')
                    ->default(true)
                    ->inline(false),
                
                Forms\Components\TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('feature')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('traditional')
                    ->limit(30),
                
                Tables\Columns\TextColumn::make('b9')
                    ->limit(30),
                
                Tables\Columns\IconColumn::make('show_icons')
                    ->boolean(),
                
                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListComparisonItems::route('/'),
            'create' => Pages\CreateComparisonItem::route('/create'),
            'edit' => Pages\EditComparisonItem::route('/{record}/edit'),
        ];
    }
}