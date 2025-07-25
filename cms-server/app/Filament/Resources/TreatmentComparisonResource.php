<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TreatmentComparisonResource\Pages;
use App\Filament\Resources\TreatmentComparisonResource\RelationManagers;
use App\Models\TreatmentComparison;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class TreatmentComparisonResource extends Resource
{
    protected static ?string $model = TreatmentComparison::class;
    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-bar';
    protected static ?string $navigationGroup = 'Home Page Sections';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->default('Success Rate Comparison'),
                
                Forms\Components\FileUpload::make('video_path')
                    ->label('Comparison Video')
                    ->required()
                    ->disk('public') // Explicitly use public disk
                    ->directory('treatment-comparison-videos')
                    ->acceptedFileTypes(['video/mp4'])
                    ->maxSize(10240) // 10MB
                    ->helperText('Upload MP4 video file (max 10MB)')
                    ->downloadable()
                    ->openable()
                    ->previewable()
                    ->panelLayout('integrated')
                    ->panelAspectRatio('16:9'),
                
                Forms\Components\TextInput::make('note_title')
                    ->required()
                    ->maxLength(255)
                    ->default('Important Note'),
                
                Forms\Components\Textarea::make('note_content')
                    ->required()
                    ->maxLength(500)
                    ->columnSpanFull(),
                
                Forms\Components\Toggle::make('is_active')
                    ->required()
                    ->default(true),
                
                Forms\Components\TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
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
                
                Tables\Columns\TextColumn::make('video_path')
                    ->label('Video')
                    ->formatStateUsing(fn ($state) => new HtmlString(
                        $state ? '<span class="px-2 py-1 bg-primary-500 text-white rounded-lg cursor-pointer hover:bg-primary-600">View Video</span>' : 'No video'
                    ))
                    ->action(
                        Tables\Actions\Action::make('viewVideo')
                            ->modalHeading('Video Preview')
                            ->modalContent(fn ($record) => view('filament.resources.treatment-comparison-resource.pages.video-preview', [
                                'videoUrl' => asset("storage/{$record->video_path}"),
                            ]))
                            ->modalWidth('xl')
                    ),
                
                Tables\Columns\TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTreatmentComparisons::route('/'),
            'create' => Pages\CreateTreatmentComparison::route('/create'),
            'edit' => Pages\EditTreatmentComparison::route('/{record}/edit'),
   
        ];
    }
}