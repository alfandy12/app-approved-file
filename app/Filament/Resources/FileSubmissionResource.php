<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FileSubmissionResource\Pages;
use App\Filament\Resources\FileSubmissionResource\RelationManagers;
use App\Models\FileSubmission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class FileSubmissionResource extends Resource
{
    protected static ?string $model = FileSubmission::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\FileUpload::make('file')->getUploadedFileNameForStorageUsing(
                    fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                        ->prepend('custom-prefix-'),
                )->required(),
                Forms\Components\Textarea::make('note')->autosize()->minLength(2)
                ->maxLength(1024)->required(),
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListFileSubmissions::route('/'),
            'create' => Pages\CreateFileSubmission::route('/create'),
            'edit' => Pages\EditFileSubmission::route('/{record}/edit'),
        ];
    }    
}
