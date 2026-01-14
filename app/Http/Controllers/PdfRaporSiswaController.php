<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\KelasX;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Str;

class PdfRaporSiswaController extends Controller
{
    public function rapor(Student $student, KelasX $rapor)
    {
        return Pdf::loadView('pdf.rapor-kelas-x', [
                'student' => $student,
                'rapor'   => $rapor,
                'errors'  => new MessageBag(), 
            ])
            ->setPaper('A4', 'portrait')
            ->download(
                'Rapor-' . Str::slug($student->nama_lengkap) . '.pdf'
            );
    }
}
