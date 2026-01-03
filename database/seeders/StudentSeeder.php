<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Student::create([
            'nama_lengkap' => 'Test Siswa',
            'nisn' => '1234567890',
            'nik' => '1234567890123456',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '2000-01-01',
            'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Islam',
            'jurusan' => 'IPA',
            'no_hp' => '08123456789',
            'alamat' => 'Jl. Test',
            'kecamatan' => 'Test',
            'kabupaten' => 'Test',
            'provinsi' => 'DKI Jakarta',
            'kode_pos' => '12345',
            'no_kk' => '1234567890123456',
            'nama_kk' => 'Test KK',
            'nama_ayah' => 'Ayah Test',
            'nik_ayah' => '1234567890123456',
            'tahun_lahir_ayah' => '1970',
            'status_ayah' => 'Kawin',
            'pekerjaan_ayah' => 'Wiraswasta',
            'penghasilan_ayah' => '5000000',
            'pendidikan_ayah' => 'SMA',
            'hp_ayah' => '08123456789',
            'nama_ibu' => 'Ibu Test',
            'nik_ibu' => '1234567890123456',
            'tahun_lahir_ibu' => '1975',
            'status_ibu' => 'Kawin',
            'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            'penghasilan_ibu' => '0',
            'pendidikan_ibu' => 'SMA',
            'hp_ibu' => '08123456789',
            'nama_sekolah' => 'SMA Test',
            'jenjang_sekolah' => 'SMA',
            'status_sekolah' => 'Negeri',
            'npsn' => '12345678',
            'alamat_sekolah' => 'Jl. Sekolah',
        ]);
    }
}
