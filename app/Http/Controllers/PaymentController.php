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
        // pastikan student benar-benar ada
        return view('pembayaran', compact('student'));
    }

    /**
     * Simpan bukti pembayaran
     */
    public function store(Request $request, Student $student)
    {
        if ($student->payments()->where('status', 'pending')->exists()) {
            return back()->withErrors([
                'proof' => 'Masih ada pembayaran yang menunggu verifikasi admin.',
            ]);
        }

        $data = $request->validate([
            'method' => 'nullable|string',
            'proof'  => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $filePath = $request->file('proof')->store('payments', 'public');

        Payment::create([
            'student_id' => $student->id,
            'invoice'    => 'INV-' . now()->format('Ymd') . '-' . Str::upper(Str::random(6)),
            'amount'     => 2500000, // samakan dengan UI
            'method'     => $data['method'] ?? 'manual',
            'proof'      => $filePath,
            'status'     => 'pending',
        ]);

        return redirect()
            ->route('payment.show', $student->id)
            ->with('success', 'Bukti pembayaran berhasil diupload, menunggu verifikasi admin.');
    }
}
