<?php

namespace App\Filament\Resources\FileSubmissionResource\Pages;

use App\Filament\Resources\FileSubmissionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFileSubmissions extends ListRecords
{
    protected static string $resource = FileSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
