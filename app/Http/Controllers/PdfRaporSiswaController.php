<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\KelasX;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfRaporSiswaController extends Controller
{
    public function rapor(Student $student, KelasX $rapor)
    {
        return Pdf::loadView('pdf.rapor-kelas-x', [
            'student' => $student,
            'rapor'   => $rapor,
        ])->download(
            'Rapor-' . $student->nama_lengkap . '.pdf'
        );
    }
}
