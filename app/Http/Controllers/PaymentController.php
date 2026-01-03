<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    /**
     * Tampilkan halaman pembayaran
     */
    public function show(Student $student)
    {
        return view('pembayaran', compact('student'));
    }

    /**
     * Simpan bukti pembayaran
     */
    public function store(Request $request, Student $student)
    {
        $data = $request->validate([
            'method' => 'required',
            'proof'  => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $filePath = $request->file('proof')->store('payments', 'public');

        Payment::create([
            'student_id' => $student->id,
            'invoice'    => 'INV-' . now()->format('Ymd') . '-' . Str::upper(Str::random(6)),
            'amount'     => 160000,
            'method'     => $data['method'],
            'proof'      => $filePath,
            'status'     => 'pending',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Bukti pembayaran berhasil diupload, menunggu verifikasi admin.');
    }
}
