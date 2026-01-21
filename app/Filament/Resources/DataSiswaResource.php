<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataSiswaResource\Pages;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SiswaExport;
use Illuminate\Database\Eloquent\Builder;


class DataSiswaResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationGroup = 'Manajemen Siswa';
    protected static ?string $navigationLabel = 'Data Siswa';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';


public static function getNavigationBadgeColor(): ?string
{
    $count = static::getModel()
        ::whereIn('status', [
            'aktif',
            'lulus',
            'nonaktif',
            'baru',
        ])
        ->count();

    return $count > 10 ? 'warning' : 'primary';
}

public static function getEloquentQuery(): Builder
{
    return parent::getEloquentQuery()
        ->whereIn('status', [
            'aktif',            
            'lulus',
            'nonaktif',
            'baru',
        ]);
}

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Data Siswa')->schema([
                Forms\Components\TextInput::make('nama_lengkap')->required(),
                Forms\Components\TextInput::make('nisn')->required(),
                Forms\Components\TextInput::make('nik')->required(),

                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\TextInput::make('tempat_lahir')->required(),
                    Forms\Components\DatePicker::make('tanggal_lahir')->required(),
                ]),

                Forms\Components\Select::make('jenis_kelamin')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->required(),

                Forms\Components\Select::make('jurusan')
                    ->options([
                        'IPA' => 'IPA',
                        'IPS' => 'IPS',
                    ])
                    ->required(),

                Forms\Components\Select::make('status')
                    ->options([
                        'aktif' => 'Aktif',
                        'nonaktif' => 'Nonaktif',
                        'lulus' => 'Lulus',
                        'baru' => 'Baru',
                    ])
                    ->required(),

            ]),
        ]);
    }

    /**
     * TABLE
     */
    public static function table(Table $table): Table
    {
        return $table
        ->query(
            Student::query()->whereIn('status', [
                'aktif',
                'lulus',
                'nonaktif',
                'baru',
            ])
        )
            ->columns([
                Tables\Columns\TextColumn::make('nama_lengkap')
                ->searchable()
                ->sortable(),


                Tables\Columns\TextColumn::make('foto')
                    ->label('Foto')
                    ->formatStateUsing(fn ($state) => $state ? '<img src="' . asset('storage/' . $state) . '" alt="Foto" class="w-16 h-16 object-cover rounded-full">' : '')
                    ->html(),
                Tables\Columns\TextColumn::make('nisn'),
                Tables\Columns\TextColumn::make('jenis_kelamin')->sortable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'success' => 'aktif',
                        'danger' => 'nonaktif',
                        'warning' => 'lulus',
                        'info' => 'baru',
                    ]),
            ])

            /**
             * ACTION PER BARIS
             */
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

                Action::make('cv')
                    ->label('CV')
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('success')
                    ->url(fn ($record) => route('siswa.cv', $record->siswa ?? $record))
                    ->openUrlInNewTab(),
            ])

            /**
             * HEADER ACTION (ATAS)
             */
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Siswa'),

                Action::make('export_excel')
                    ->label('Export Excel')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->action(fn () => Excel::download(new SiswaExport, 'data-siswa.xlsx')),
            ]);

    }

    /**
     * PAGES
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDataSiswa::route('/'),
            'create' => Pages\CreateDataSiswa::route('/create'),
            'edit' => Pages\EditDataSiswa::route('/{record}/edit'),
        ];
    }
}
