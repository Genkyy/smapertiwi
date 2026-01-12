<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaBaruResource\Pages;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;


class SiswaBaruResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationGroup = 'Pendaftaran';
    protected static ?string $navigationLabel = 'Siswa Baru';
    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    
    public static function getNavigationBadge(): ?string
{
    return (string) static::getModel()::where('status', 'baru')->count();

}
public static function getNavigationBadgeColor(): ?string
{
    return static::getModel()
    ::where('status', 'baru')
    ->count() > 10 ? 'warning' : 'primary';

}
public static function getEloquentQuery(): Builder
{
    return parent::getEloquentQuery()
        ->where('status', 'baru');
}

    public static function form(Form $form): Form
    {
        return $form->schema([

            /* ================= DATA SISWA ================= */
            Forms\Components\Section::make('Data Calon Siswa')
                ->icon('heroicon-o-user')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('nama_lengkap')->required(),
                    Forms\Components\TextInput::make('nisn')->required(),
                    Forms\Components\TextInput::make('nik')->required(),

                    Forms\Components\TextInput::make('tempat_lahir')->required(),
                    Forms\Components\DatePicker::make('tanggal_lahir')->required(),

                    Forms\Components\Select::make('jenis_kelamin')
                        ->options([
                            'Laki-laki' => 'Laki-laki',
                            'Perempuan' => 'Perempuan',
                        ])->required(),

                    Forms\Components\Select::make('agama')
                        ->options([
                            'Islam' => 'Islam',
                            'Kristen' => 'Kristen',
                            'Katolik' => 'Katolik',
                            'Hindu' => 'Hindu',
                            'Budha' => 'Budha',
                        ])->required(),

                    Forms\Components\Select::make('jurusan')
                        ->options([
                            'IPA' => 'IPA',
                            'IPS' => 'IPS',
                        ])->required(),

                    Forms\Components\TextInput::make('no_hp')->required(),

                    Forms\Components\Select::make('ekskul')->options([
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
                ->icon('heroicon-o-map')
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
            Forms\Components\Section::make('Data Orang Tua & Wali')
                ->icon('heroicon-o-users')
                ->schema([

                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('no_kk')->required(),
                        Forms\Components\TextInput::make('nama_kk')->required(),
                    ]),

                    Forms\Components\Section::make('Data Ayah')->schema([
                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\TextInput::make('nama_ayah')->required(),
                            Forms\Components\TextInput::make('nik_ayah')->required(),
                            Forms\Components\TextInput::make('tahun_lahir_ayah')
                                ->numeric()
                                ->minValue(1950)
                                ->maxValue(date('Y'))
                                ->required(),
                            Forms\Components\Select::make('status_ayah')
                                ->options([
                                    'Masih Hidup' => 'Masih Hidup',
                                    'Sudah Meninggal' => 'Sudah Meninggal',
                                ])->required(),
                        ]),
                        Forms\Components\TextInput::make('pekerjaan_ayah'),
                        Forms\Components\TextInput::make('penghasilan_ayah'),
                        Forms\Components\TextInput::make('pendidikan_ayah'),
                        Forms\Components\TextInput::make('hp_ayah')->required(),
                    ]),

                    Forms\Components\Section::make('Data Ibu')->schema([
                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\TextInput::make('nama_ibu')->required(),
                            Forms\Components\TextInput::make('nik_ibu')->required(),
                            Forms\Components\TextInput::make('tahun_lahir_ibu')->required(),
                            Forms\Components\Select::make('status_ibu')
                                ->options([
                                    'Masih Hidup' => 'Masih Hidup',
                                    'Sudah Meninggal' => 'Sudah Meninggal',
                                ])->required(),
                        ]),
                        Forms\Components\TextInput::make('pekerjaan_ibu'),
                        Forms\Components\TextInput::make('penghasilan_ibu'),
                        Forms\Components\TextInput::make('pendidikan_ibu'),
                        Forms\Components\TextInput::make('hp_ibu')->required(),
                    ]),
                ]),

            /* ================= SEKOLAH ASAL ================= */
            Forms\Components\Section::make('Sekolah Asal')
                ->icon('heroicon-o-academic-cap')
                ->schema([
                    Forms\Components\TextInput::make('nama_sekolah')->required(),

                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\Select::make('jenjang_sekolah')
                            ->options(['SMP' => 'SMP', 'MTS' => 'MTS'])->required(),
                        Forms\Components\Select::make('kelas')
                            ->options(['X' => 'X', 'XI' => 'XI', 'XII' => 'XII'])->required(),
                        Forms\Components\Select::make('status_sekolah')
                            ->options(['Negeri' => 'Negeri', 'Swasta' => 'Swasta'])->required(),
                    ]),

                    Forms\Components\TextInput::make('npsn'),
                    Forms\Components\Textarea::make('alamat_sekolah'),
                ]),

            /* ================= DOKUMEN ================= */
            Forms\Components\Section::make('Dokumen')
                ->icon('heroicon-o-document')
                ->schema([
                    Forms\Components\FileUpload::make('foto')->image()->directory('siswa/foto'),
                    Forms\Components\FileUpload::make('kk')->directory('siswa/kk'),
                    Forms\Components\FileUpload::make('ijazah')->directory('siswa/ijazah'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_lengkap')->searchable()->sortable(),
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto Siswa')
                    ->disk('public')
                    ->height(80)
                    ->visibility('private'),
                Tables\Columns\TextColumn::make('kelas'),
                Tables\Columns\TextColumn::make('jurusan')
                    ->colors([
                        'primary' => 'IPA',
                        'success' => 'IPS',
                    ]),
                    
                Tables\Columns\BadgeColumn::make('payments.status')
                ->label('Status pembayaran')
                ->colors([
                    'warning' => 'pending',
                    'info' => 'verifikasi',
                    'success' => 'diterima',
                    'danger' => 'ditolak',
                ]),  
                Tables\Columns\TextColumn::make('created_at')->date()->label('Tanggal Daftar'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiswaBaru::route('/'),
            'create' => Pages\CreateSiswaBaru::route('/create'),
            'edit' => Pages\EditSiswaBaru::route('/{record}/edit'),
        ];
    }
}
