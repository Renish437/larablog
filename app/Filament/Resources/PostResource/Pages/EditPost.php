<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function mutateFormDataBeforeSave(array $data): array
{
   
    if (isset($data['thumbnail_path'])) {
        $data['thumbnail'] = $data['thumbnail_path'];
        unset($data['thumbnail_path']);
    }
    return $data;
}
}
