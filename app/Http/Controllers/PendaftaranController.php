<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function create()
    {
        return view('pendaftaran.index');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        // DATA SISWA
        'nama_lengkap'  => 'required|string',
        'nisn'          => 'required|digits:10|unique:students,nisn',
        'nik'           => 'required|digits:16|unique:students,nik',
        'tempat_lahir'  => 'required|string',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'agama'         => 'required|string',
        'jurusan'       => 'required|string',
        'no_hp'         => 'required|string',
        'ekskul'        => 'nullable|string',
        'info_dari'     => 'nullable|string',

        // ALAMAT
        'alamat'    => 'required|string',
        'kecamatan' => 'required|string',
        'kabupaten' => 'required|string',
        'provinsi'  => 'required|string',
        'kode_pos'  => 'required|string',

        // KK
        'no_kk'   => 'required|string',
        'nama_kk' => 'required|string',

        // AYAH
        'nama_ayah'        => 'required|string',
        'nik_ayah'         => 'required|string',
        'tahun_lahir_ayah' => 'required|integer',
        'status_ayah'      => 'required|string',
        'pekerjaan_ayah'   => 'required|string',
        'penghasilan_ayah' => 'required|string',
        'pendidikan_ayah'  => 'required|string',
        'hp_ayah'          => 'required|string',

        // IBU
        'nama_ibu'        => 'required|string',
        'nik_ibu'         => 'required|string',
        'tahun_lahir_ibu' => 'required|integer',
        'status_ibu'      => 'required|string',
        'pekerjaan_ibu'   => 'required|string',
        'penghasilan_ibu' => 'required|string',
        'pendidikan_ibu'  => 'required|string',
        'hp_ibu'          => 'required|string',

        // WALI
        'nama_wali'        => 'nullable|string',
        'nik_wali'         => 'nullable|string',
        'tahun_lahir_wali' => 'nullable|integer',
        'status_wali'      => 'nullable|string',
        'pekerjaan_wali'   => 'nullable|string',
        'penghasilan_wali' => 'nullable|string',
        'pendidikan_wali'  => 'nullable|string',
        'hp_wali'          => 'nullable|string',

        // BANTUAN
        'no_kks' => 'nullable|string',
        'no_pkh' => 'nullable|string',
        'no_kip' => 'nullable|string',

        // SEKOLAH
        'nama_sekolah'    => 'required|string',
        'jenjang_sekolah' => 'required|string',
        'kelas'           => 'required|string',
        'status_sekolah'  => 'required|string',
        'npsn'            => 'required|string',
        'alamat_sekolah'  => 'required|string',

        // FILE
        'foto'    => 'nullable|image|max:2048',
        'kk'      => 'nullable|file|max:2048',
        'ijazah'  => 'nullable|file|max:2048',

        // KONFIRMASI
        'pernyataan' => 'accepted',
    ]);

    if ($request->hasFile('foto')) {
        $data['foto'] = $request->file('foto')->store('foto', 'public');
    }
    if ($request->hasFile('kk')) {
        $data['kk'] = $request->file('kk')->store('kk', 'public');
    }
    if ($request->hasFile('ijazah')) {
        $data['ijazah'] = $request->file('ijazah')->store('ijazah', 'public');
    }

    $data['status'] = 'baru';

    $student = Student::create($data);

    return redirect()
        ->route('payment.show', $student->id)
        ->with('success', 'Pendaftaran berhasil, silakan lakukan pembayaran');
}

}
