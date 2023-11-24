<?php

namespace App\Filament\Resources\FileSubmissionResource\Pages;

use App\Filament\Resources\FileSubmissionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFileSubmission extends EditRecord
{
    protected static string $resource = FileSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
