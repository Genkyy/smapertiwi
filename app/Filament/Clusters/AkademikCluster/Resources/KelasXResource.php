<?php

namespace App\Filament\Clusters\AkademikCluster\Resources;

use App\Filament\Clusters\AkademikCluster;
use App\Filament\Clusters\AkademikCluster\Resources\KelasXResource\Pages;
use App\Filament\Clusters\AkademikCluster\Resources\KelasXResource\RelationManagers;
use App\Models\KelasX;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;


class KelasXResource extends Resource
{
    protected static ?string $model = KelasX::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $cluster = AkademikCluster::class;

    public static function form(Form $form): Form
{
    return $form->schema([

        Forms\Components\Select::make('student_id')
    ->label('Nama Siswa')
    ->relationship(
        'student',
        'nama_lengkap',
        fn ($query) => $query->where('kelas', 'X')
    )
    ->searchable()
    ->preload()
    ->required(),


        Forms\Components\Select::make('semester')
            ->options(['Ganjil' => 'Ganjil', 'Genap' => 'Genap'])
            ->required(),

        Forms\Components\TextInput::make('tahun_ajaran')
            ->placeholder('2024/2025')
            ->required(),

        // ===== NILAI MAPEL =====
        Forms\Components\Section::make('Nilai Mata Pelajaran')->schema([
            Forms\Components\TextInput::make('pai')->numeric()->required(),
            Forms\Components\TextInput::make('ppkn')->numeric()->required(),
            Forms\Components\TextInput::make('bahasa_indonesia')->numeric()->required(),
            Forms\Components\TextInput::make('matematika')->numeric()->required(),
            Forms\Components\TextInput::make('bahasa_inggris')->numeric()->required(),
            Forms\Components\TextInput::make('sejarah')->numeric()->required(),
            forms\Components\TextInput::make('informatika')->numeric()->required(),
            forms\Components\TextInput::make('pjok')->numeric()->required(),
        ])->columns(3),

        // ===== PENGEMBANGAN DIRI =====
        Forms\Components\Section::make('Pengembangan Diri')->schema([
            Forms\Components\Select::make('pramuka')
                ->options(['SB'=>'Sangat Baik','B'=>'Baik','C'=>'Cukup']),
            Forms\Components\Select::make('osis')
                ->options(['SB'=>'Sangat Baik','B'=>'Baik','C'=>'Cukup']),
        ])->columns(2),

        // ===== AKHLAK =====
        Forms\Components\Section::make('Akhlak & Kepribadian')->schema([
            Forms\Components\Select::make('disiplin')
                ->options(['SB','B','C','K'])->required(),
            Forms\Components\Select::make('tanggung_jawab')
                ->options(['SB','B','C','K'])->required(),
            Forms\Components\Select::make('sopan_santun')
                ->options(['SB','B','C','K'])->required(),
        ])->columns(3),

        // ===== KETIDAKHADIRAN =====
        Forms\Components\Section::make('Ketidakhadiran')->schema([
            Forms\Components\TextInput::make('sakit')->numeric(),
            Forms\Components\TextInput::make('izin')->numeric(),
            Forms\Components\TextInput::make('alpha')->numeric(),
        ])->columns(3),

    ]);
}

    public static function table(Table $table): Table
{
    return $table
        ->query(
            static::getModel()::query()
                ->whereHas('student', function ($query) {
                    $query->where('kelas', 'X'); // ⬅️ FILTER KELAS X
                })
        )

        ->columns([
            Tables\Columns\TextColumn::make('student.nama_lengkap')
                ->label('Nama Siswa')
                ->searchable(),

            Tables\Columns\TextColumn::make('semester'),
            Tables\Columns\TextColumn::make('tahun_ajaran'),

            Tables\Columns\TextColumn::make('created_at')
                ->date()
                ->label('Tanggal Input'),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),

                Action::make('rapor')
                    ->label('Rapor')
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('success')
                    ->url(fn (KelasX $record) => route('siswa.rapor', [
        'student' => $record->student_id,
        'rapor'   => $record->id,
    ]))
                    ->openUrlInNewTab(),
            ])

        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
}


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKelasX::route('/'),
            'create' => Pages\CreateKelasX::route('/create'),
            'edit' => Pages\EditKelasX::route('/{record}/edit'),
        ];
    }
}
