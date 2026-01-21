<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SPPInvoisResource\Pages;
use App\Models\TagihanSpp;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;

use Filament\Resources\Resource;

use Filament\Tables;
use Filament\Tables\Table;

use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\EditAction;

use Filament\Notifications\Notification;

class SPPInvoisResource extends Resource
{
    protected static ?string $model = TagihanSpp::class;

    protected static ?string $navigationGroup = 'Keuangan';
    protected static ?string $navigationLabel = 'Tagihan SPP';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Tagihan SPP')
                ->icon('heroicon-o-document-text')
                ->columns(2)
                ->schema([

                    Forms\Components\TextInput::make('student_id')
                        ->label('ID Siswa')
                        ->required(),

                    Select::make('bulan')
                        ->label('Bulan Tagihan')
                        ->options([
                            'Januari' => 'Januari',
                            'Februari' => 'Februari',
                            'Maret' => 'Maret',
                            'April' => 'April',
                            'Mei' => 'Mei',
                            'Juni' => 'Juni',
                            'Juli' => 'Juli',
                            'Agustus' => 'Agustus',
                            'September' => 'September',
                            'Oktober' => 'Oktober',
                            'November' => 'November',
                            'Desember' => 'Desember',
                        ])
                        ->required(),

                    Forms\Components\TextInput::make('tahun_ajaran')
                        ->label('Tahun Ajaran')
                        ->required(),

                    Forms\Components\TextInput::make('nominal')
                        ->label('Nominal')
                        ->numeric()
                        ->required(),

                    Select::make('status')
                        ->label('Status Pembayaran')
                        ->options([
                            'unpaid' => 'Belum Bayar',
                            'paid' => 'Sudah Bayar',
                        ])
                        ->default('unpaid')
                        ->required(),

                    Forms\Components\DatePicker::make('jatuh_tempo')
                        ->label('Jatuh Tempo'),

                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('student.nama_lengkap')
                    ->label('Siswa')
                    ->searchable(),

                Tables\Columns\TextColumn::make('bulan')
                    ->label('Bulan'),

                Tables\Columns\TextColumn::make('tahun_ajaran')
                    ->label('Tahun'),

                Tables\Columns\TextColumn::make('nominal')
                    ->label('Nominal')
                    ->money('IDR'),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'danger' => 'unpaid',
                        'success' => 'paid',
                    ]),

                Tables\Columns\TextColumn::make('jatuh_tempo')
                    ->label('Jatuh Tempo')
                    ->date(),

            ])

            ->actions([

                    Action::make('acc')
                    ->label('ACC')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn (TagihanSpp $record) => $record->status === 'unpaid')
                    ->requiresConfirmation()
                    ->modalHeading('Setujui Pembayaran')
                    ->modalDescription('Apakah Anda yakin ingin menyetujui pembayaran SPP ini?')
                    ->action(function (TagihanSpp $record) {

                        $record->update([
                            'status' => 'paid',
                        ]);

                        Notification::make()
                            ->title('Pembayaran Disetujui')
                            ->body('Status tagihan SPP berhasil diubah menjadi LUNAS.')
                            ->success()
                            ->send();
                    }),

                Action::make('bayar')
                    ->label('Bayar sekaligus')
                    ->icon('heroicon-o-banknotes')
                    ->color('info')
                    ->form([
                        Select::make('bulan')
                            ->label('Bayar Bulan')
                            ->multiple()
                            ->required()
                            ->options([
                                'Januari' => 'Januari',
                                'Februari' => 'Februari',
                                'Maret' => 'Maret',
                                'April' => 'April',
                                'Mei' => 'Mei',
                                'Juni' => 'Juni',
                                'Juli' => 'Juli',
                                'Agustus' => 'Agustus',
                                'September' => 'September',
                                'Oktober' => 'Oktober',
                                'November' => 'November',
                                'Desember' => 'Desember',
                            ]),
                    ])
                    ->action(function (TagihanSpp $record, array $data) {

                        foreach ($data['bulan'] as $bulan) {
                            TagihanSpp::updateOrCreate(
                                [
                                    'student_id' => $record->student_id,
                                    'bulan' => $bulan,
                                    'tahun_ajaran' => $record->tahun_ajaran,
                                ],
                                [
                                    'nominal' => $record->nominal,
                                    'status' => 'paid',
                                ]
                            );
                        }

                        Notification::make()
                            ->title('Pembayaran Berhasil')
                            ->body('Tagihan bulan terpilih telah dilunasi.')
                            ->success()
                            ->send();
                    }),



                EditAction::make(),
            ])
            ->bulkActions([
                BulkAction::make('bayar')
                    ->label('Bayar Tagihan Terpilih')
                    ->icon('heroicon-o-banknotes')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(function ($records) {

                        foreach ($records as $tagihan) {
                            if ($tagihan->status === 'unpaid') {
                                $tagihan->update([
                                    'status' => 'paid',
                                ]);
                            }
                        }

                        Notification::make()
                            ->title('Pembayaran Berhasil')
                            ->body('Tagihan terpilih berhasil dilunasi.')
                            ->success()
                            ->send();
                    }),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSPPInvois::route('/'),
            'create' => Pages\CreateSPPInvois::route('/create'),
            'edit' => Pages\EditSPPInvois::route('/{record}/edit'),
        ];
    }
}
