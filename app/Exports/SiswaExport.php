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
        return Student::query();
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

    public function map($student): array
    {
        return [
            $student->nisn,
            $student->nama_lengkap,
            $student->kelas,
            $student->jenis_kelamin,
            $student->tanggal_lahir,
        ];
    }

}
