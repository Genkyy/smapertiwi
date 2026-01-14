<?php

namespace App\Http\Controllers;

use App\Models\PembayaranSPP;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Payment;

class kwitansiControlller extends Controller
{

public function kwitansi(PembayaranSPP $pembayaranSPP)
{
    abort_unless($pembayaranSPP->status === 'verified', 403);

    return Pdf::loadView('pdf.kwitansi', [
        'pembayaranSPP' => $pembayaranSPP,
    ])->stream("Kwitansi-{$pembayaranSPP->invoice}.pdf");
}

}