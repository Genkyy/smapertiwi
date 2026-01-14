<?php

namespace App\Filament\Resources\PaymentResource\Pages;

use App\Filament\Resources\PaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePayment extends CreateRecord
{
    protected static string $resource = PaymentResource::class;
    protected function getRedirectUrl(): string
    {
        return session()->pull(
            'payment_return_url',
            $this->getResource()::getUrl('index')
        );
    }
}
