<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProjectFileResource\Pages;
use App\Filament\Admin\Resources\ProjectFileResource\RelationManagers;
use App\Models\ProjectFile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Uploader;

class ProjectFileResource extends Resource
{
    protected static ?string $model = ProjectFile::class;

    //protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                        \Filament\Forms\Components\Select::make('project_id')
                            ->label('Project')
                            ->options(\App\Models\Project::all()
                                ->pluck('name', 'id'))
                            ->required(),


                            \Filament\Forms\Components\FileUpload::make('files')
                            ->label('Upload Files')
                            ->multiple()
                            ->required()
                            ->enableDownload()
                            ->enableOpen()
                            ->preserveFilenames()
                            ->storeFilenamesIn('file_name')
                            
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
                    \Filament\Tables\Columns\TextColumn::make('project.name')
                        ->sortable()->searchable()
                        ->wrap(),
                    \Filament\Tables\Columns\TextColumn::make('created_at')
                        ->date()
                        ->sortable()->searchable(),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                //
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
            'index' => Pages\ListProjectFiles::route('/'),
            'create' => Pages\CreateProjectFile::route('/create'),
            'edit' => Pages\EditProjectFile::route('/{record}/edit'),
        ];
    }
}
