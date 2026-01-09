<?php

namespace App\Exports;

use App\Filament\Resources\DataSiswaResource\Pages;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SiswaExport implements FromQuery, WithHeadings, WithMapping
{
    public function query()
    {
        return Siswa::query();
    }

    public function headings(): array
    {
        return [
            'NIS',
            'Nama Siswa',
            'Kelas',
            'Jenis Kelamin',
            'Tanggal Lahir',
        ];
    }

    public function map($siswa): array
    {
        return [
            $siswa->nis,
            $siswa->nama,
            $siswa->kelas,
            $siswa->jenis_kelamin,
            $siswa->tanggal_lahir?->format('d-m-Y'),
        ];
    }

    
}
