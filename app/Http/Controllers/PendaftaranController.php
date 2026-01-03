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
            'nisn'          => 'required|string|unique:students,nisn',
            'nik'           => 'required|string|unique:students,nik',
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

            // KEPALA KELUARGA
            'no_kk'   => 'required|string',
            'nama_kk' => 'required|string',

            // AYAH
            'nama_ayah'        => 'required|string',
            'nik_ayah'         => 'required|string',
            'tahun_lahir_ayah' => 'nullable|integer',
            'status_ayah'      => 'nullable|string',
            'pekerjaan_ayah'   => 'nullable|string',
            'penghasilan_ayah' => 'nullable|string',
            'pendidikan_ayah'  => 'nullable|string',
            'hp_ayah'          => 'nullable|string',

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
            'kelas'           => 'nullable|string',
            'status_sekolah'  => 'required|string',
            'npsn'            => 'required|string',
            'alamat_sekolah'  => 'required|string',

            // FILE
            'foto'    => 'nullable|file|image|max:2048',
            'kk'      => 'nullable|file|max:2048',
            'ijazah'  => 'nullable|file|max:2048',
        ]);

        // upload file
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto', 'public');
        }

        if ($request->hasFile('kk')) {
            $data['kk'] = $request->file('kk')->store('kk', 'public');
        }

        if ($request->hasFile('ijazah')) {
            $data['ijazah'] = $request->file('ijazah')->store('ijazah', 'public');
        }

        // default status
        $data['status'] = 'pending';


        $student = Student::create($data);

        return redirect()
            ->route('payment.show', $student->id)
            ->with('success', 'Pendaftaran berhasil, silakan lakukan pembayaran');
    }
}
