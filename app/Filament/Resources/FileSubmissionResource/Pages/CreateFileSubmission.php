<?php

namespace App\Filament\Resources\FileSubmissionResource\Pages;

use App\Filament\Resources\FileSubmissionResource;
use App\Models\FileSubmissionHistory;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFileSubmission extends CreateRecord
{
    protected static string $resource = FileSubmissionResource::class;
    //update data before create
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }

    protected function afterCreate(): void
    {
        $userId = auth()->id();
        $storedDataId = $this->record->getKey();
        dd($storedDataId);
        $storedDataField = $this->record->yourFieldName;
       /*  // Ambil ID FileSubmission yang baru saja dibuat
        $fileSubmissionId = $record->id;

        // Buat history setelah penciptaan FileSubmission
        $this->saveHistory($userId, $fileSubmissionId); */
    }

    protected function saveHistory($userId, $fileSubmissionId): void
    {
        $history = FileSubmissionHistory::create([
            'user_id' => $userId,
            'file_submission_id' => $fileSubmissionId,
            'action' => 'File submission created',
        ]);
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
