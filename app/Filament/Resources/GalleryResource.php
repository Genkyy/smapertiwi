<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Livewire\TemporaryUploadedFile;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Event Sekolah';
    protected static ?string $navigationLabel = 'Galeri';
    protected static ?string $pluralModelLabel = 'Galeri';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                // Judul kegiatan
                Forms\Components\TextInput::make('judul')
                    ->label('Judul Kegiatan')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->rows(3)
                    ->maxLength(255),

                Grid::make(3)->schema([
                    Forms\Components\DatePicker::make('tanggal')
                        ->label('Tanggal')
                        ->required(),

                    Forms\Components\Select::make('bulan')
                        ->label('Bulan')
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

                    Forms\Components\Select::make('tahun')
                        ->label('Tahun')
                        ->options(
                            collect(range(2020, date('Y') + 1))
                                ->mapWithKeys(fn ($y) => [$y => $y])
                        )
                        ->default(date('Y'))
                        ->required(),
                ]),

                Forms\Components\FileUpload::make('foto')
                    ->label('Foto Kegiatan')
                    ->image()
                    ->disk('public')
                    ->directory('galeri')
                    ->visibility('public')
                    ->imagePreviewHeight(150)
                    ->enableOpen()
                    ->enableDownload()
                    ->hint('Upload gambar kegiatan (jpg/png/webp)')
                    ->acceptedFileTypes([
                        'image/jpeg',
                        'image/png',
                        'image/webp',
                        'image/svg+xml',
                    ])
                    ->getUploadedFileNameForStorageUsing(
                    fn ($file): string =>
                        md5($file->getClientOriginalName() . microtime()) . '.' .
                        $file->getClientOriginalExtension()
                )
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->defaultImageUrl(asset('assets/images/no-image.png'))
                    ->square()
                    ->size(80),

                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date('d M Y'),

                Tables\Columns\TextColumn::make('bulan')
                    ->label('Bulan'),

                Tables\Columns\TextColumn::make('tahun')
                    ->label('Tahun')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
