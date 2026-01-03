<?php

namespace App\Filament\Resources\SectionResource\Pages;

use App\Filament\Resources\SectionResource;
use App\Model\Section;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSection extends EditRecord
{
    protected static string $resource = SectionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                function (Section $record) {
                    if ($record->thumbnail) {
                        Storage::disk('public')->delate($record->thumbnail);
                    }
                }
            ),
        ];
    }
}
