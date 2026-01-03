<?php

namespace App\Filament\Resources\CalendarEventResource\Pages;

use App\Filament\Resources\CalendarEventResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCalendarEvent extends CreateRecord
{
    protected static string $resource = CalendarEventResource::class;
    protected function getRedirectUrl(): string
    {
        // Setelah simpan, kembali ke halaman list
        return $this->getResource()::getUrl('index');
    }
}
