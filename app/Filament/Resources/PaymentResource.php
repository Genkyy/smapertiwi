<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Models\Payment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationGroup = 'Pendaftaran';
    protected static ?string $navigationLabel = 'Pembayaran';
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Data Pembayaran')
                ->schema([
                    Forms\Components\Select::make('status')
                        ->options([
                            'pending' => 'Pending',
                            'approved' => 'Disetujui',
                            'rejected' => 'Ditolak',
                        ])
                        ->required(),

                    Forms\Components\Textarea::make('note')
                        ->label('Catatan Admin'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('invoice')
                ->searchable(),

            Tables\Columns\TextColumn::make('student.nama_lengkap')
                ->label('Nama Siswa'),

            Tables\Columns\TextColumn::make('amount')
                ->money('IDR'),

            Tables\Columns\ImageColumn::make('proof')
                ->label('Bukti')
                ->disk('public')
                ->height(80),

            Tables\Columns\BadgeColumn::make('status')
                ->colors([
                    'warning' => 'pending',
                    'success' => 'approved',
                    'danger' => 'rejected',
                ]),
        ])
        ->actions([
            Tables\Actions\Action::make('approve')
                ->label('Setujui')
                ->color('success')
                ->icon('heroicon-o-check-circle')
                ->visible(fn ($record) => $record->status === 'pending')
                ->requiresConfirmation()
                ->action(function ($record) {
                    $record->update(['status' => 'approved']);

                    if ($record->student) {
                        $record->student->update(['status' => 'verifikasi']);
                    }

                    Notification::make()
                        ->title('Pembayaran Disetujui')
                        ->body('Pembayaran ' . $record->invoice . ' berhasil diverifikasi.')
                        ->success()
                        ->send();
                }),

            Tables\Actions\Action::make('reject')
                ->label('Tolak')
                ->color('danger')
                ->icon('heroicon-o-x-circle')
                ->visible(fn ($record) => $record->status === 'pending')
                ->requiresConfirmation()
                ->action(function ($record) {
                    $record->update(['status' => 'rejected']);

                    Notification::make()
                        ->title('Pembayaran Ditolak')
                        ->body('Pembayaran ' . $record->invoice . ' ditolak.')
                        ->danger()
                        ->send();
                }),

            Tables\Actions\EditAction::make(),
        ]);
}


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayments::route('/'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
