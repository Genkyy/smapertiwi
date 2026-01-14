<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SectionResource\Pages;
use App\Models\Section;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Livewire\TemporaryUploadedFile;

class SectionResource extends Resource
{
    protected static ?string $model = Section::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Event Sekolah';
    protected static ?string $navigationLabel = 'Artikel';
    protected static ?string $pluralModelLabel = 'Artikel';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        // Judul Artikel
                        Forms\Components\TextInput::make('tittle')
                            ->label('Judul Artikel')
                            ->required()
                            ->maxLength(255),

                        // Gambar / Thumbnail
                        Forms\Components\FileUpload::make('thumbnail')
                            ->label('Foto Artikel')
                            ->image()
                            ->disk('public')
                            ->directory('thumbnails')
                            ->visibility('public')
                            ->imagePreviewHeight(380)
                            ->enableOpen()
                            ->enableDownload()
                            ->hint('Upload gambar artikel (jpg/png/webp)')
                            ->acceptedFileTypes([
                                'image/jpeg',
                                'image/png',
                                'image/webp',
                                'image/svg+xml',
                            ])
                            ->getUploadedFileNameForStorageUsing(
                                fn (TemporaryUploadedFile $file): string =>
                                    md5($file->getClientOriginalName() . microtime()) .
                                    '.' . $file->getClientOriginalExtension()
                            ),

                        // Isi Artikel
                        Forms\Components\RichEditor::make('content')
                            ->label('Isi Artikel')
                            ->required(),

                        // Kategori
                        Forms\Components\Select::make('post_as')
                            ->label('Kategori')
                            ->options([
                                'Artikel' => 'Artikel',
                                'Pengumuman' => 'Pengumuman',
                                'Berita' => 'Berita',
                            ])
                            ->required(),

                        // Grid tanggal & penulis
                        Grid::make(2)
                            ->schema([
                                Forms\Components\DatePicker::make('published_at')
                                    ->label('Tanggal Penulisan')
                                    ->required(),

                                Forms\Components\TextInput::make('author')
                                    ->label('Penulis')
                                    ->placeholder('Nama penulis')
                                    ->required(),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tittle')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Gambar')
                    ->square()
                    ->size(80),

                Tables\Columns\TextColumn::make('post_as')
                    ->label('Kategori')
                    ->sortable(),

                Tables\Columns\TextColumn::make('author')
                    ->label('Penulis'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
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
            'index' => Pages\ListSections::route('/'),
            'create' => Pages\CreateSection::route('/create'),
            'edit' => Pages\EditSection::route('/{record}/edit'),
        ];
    }
}
