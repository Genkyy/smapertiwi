<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfSiswaController extends Controller
{
    public function cv(Student $student)
    {
        return Pdf::loadView('pdf.cv-siswa', [
            'siswa' => $student,
        ])->download('CV-'.$student->nama_lengkap.'.pdf');
    }
}
