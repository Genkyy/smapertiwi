<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataSiswaResource\Pages;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SiswaExport;
use Filament\Tables\Actions\Action;



class DataSiswaResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationGroup = 'Manajemen Siswa';
    protected static ?string $navigationLabel = 'Data Siswa';
    protected static ?string $navigationIcon = 'heroicon-o-users';

    /**
     * FORM (CREATE & EDIT)
     */
    public static function form(Form $form): Form
{
    return $form
        ->schema([

            /* ================= DATA SISWA ================= */
            Forms\Components\Section::make('Data Siswa')
                ->schema([
                    Forms\Components\TextInput::make('nama_lengkap')
                        ->required(),

                    Forms\Components\TextInput::make('nisn')
                        ->required(),

                    Forms\Components\TextInput::make('nik')
                        ->required(),

                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('tempat_lahir')
                            ->required(),
                        Forms\Components\DatePicker::make('tanggal_lahir')
                            ->required(),
                    ]),

                    Forms\Components\Select::make('jenis_kelamin')
                        ->options([
                            'Laki-laki' => 'Laki-laki',
                            'Perempuan' => 'Perempuan',
                        ])
                        ->required(),

                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\Select::make('agama')
                            ->options([
                                'Islam' => 'Islam',
                                'Kristen' => 'Kristen',
                                'Katolik' => 'Katolik',
                                'Hindu' => 'Hindu',
                                'Buddha' => 'Buddha',
                                'Konghucu' => 'Konghucu',
                            ])
                            ->required(),

                        Forms\Components\Select::make('jurusan')
                            ->options([
                                'IPA' => 'IPA',
                                'IPS' => 'IPS',
                            ])
                            ->required(),
                    ]),

                    Forms\Components\TextInput::make('no_hp')
                        ->required(),

                    Forms\Components\Select::make('ekskul')
                        ->options([
                            'Futsal' => 'Futsal',
                            'Basket' => 'Basket',
                            'Musik' => 'Musik',
                            'Pramuka' => 'Pramuka',
                            'Tari' => 'Tari',
                            'Tahfidz' => 'Tahfidz',
                            'Multimedia' => 'Multimedia',
                            'E-Sport' => 'E-Sport',
                        ]),

                    Forms\Components\TextInput::make('info_dari'),
                ]),

            /* ================= ALAMAT ================= */
            Forms\Components\Section::make('Alamat')
                ->schema([
                    Forms\Components\Textarea::make('alamat')->required(),

                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('kecamatan')->required(),
                        Forms\Components\TextInput::make('kabupaten')->required(),
                    ]),

                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('provinsi')->required(),
                        Forms\Components\TextInput::make('kode_pos')->required(),
                    ]),
                ]),

            /* ================= ORANG TUA ================= */
            Forms\Components\Section::make('Data Orang Tua')
                ->schema([
                    Forms\Components\TextInput::make('no_kk')->required(),
                    Forms\Components\TextInput::make('nama_kk')->required(),

                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('nama_ayah')->required(),
                        Forms\Components\TextInput::make('nik_ayah')->required(),
                    ]),

                    Forms\Components\TextInput::make('hp_ayah')->required(),

                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('nama_ibu')->required(),
                        Forms\Components\TextInput::make('nik_ibu')->required(),
                    ]),

                    Forms\Components\TextInput::make('hp_ibu')->required(),
                ]),

            /* ================= SEKOLAH ASAL ================= */
            Forms\Components\Section::make('Sekolah Asal')
                ->schema([
                    Forms\Components\TextInput::make('nama_sekolah')->required(),

                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\Select::make('jenjang_sekolah')
                            ->options([
                                'SMP' => 'SMP',
                                'MTS' => 'MTS',
                            ])
                            ->required(),

                        Forms\Components\Select::make('status_sekolah')
                            ->options([
                                'Negeri' => 'Negeri',
                                'Swasta' => 'Swasta',
                            ])
                            ->required(),
                    ]),

                    Forms\Components\TextInput::make('kelas')
                        ->label('Kelas Terakhir'),

                    Forms\Components\TextInput::make('npsn'),
                    Forms\Components\Textarea::make('alamat_sekolah'),
                ]),

            /* ================= DOKUMEN ================= */
            Forms\Components\Section::make('Dokumen')
                ->schema([
                    Forms\Components\FileUpload::make('foto')
                        ->image(),

                    Forms\Components\FileUpload::make('kk'),
                    Forms\Components\FileUpload::make('ijazah'),
                ]),
        ]);
}


    /**
     * TABLE (LIST DATA)
     */
    public static function table(Table $table): Table
    {
        return $table
            ->query(Student::query()) // 🔥 PENTING
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('nisn')
                    ->label('NISN'),

                Tables\Columns\TextColumn::make('jurusan')
                    ->label('Jurusan'),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'success' => 'aktif',
                        'danger' => 'nonaktif',
                    ]),
            ])
            
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Action::make('export')
        ->label('Export Excel')
        ->icon('heroicon-o-arrow-down-tray')
        ->color('success')
        ->action(fn () => Excel::download(
            new SiswaExport,
            'data-siswa.xlsx'
        )),
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
