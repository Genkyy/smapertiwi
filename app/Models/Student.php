<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        // siswa
        'nama_lengkap','nisn','nik','tempat_lahir','tanggal_lahir',
        'jenis_kelamin','agama','jurusan','no_hp','ekskul','info_dari',

        // alamat
        'alamat','kecamatan','kabupaten','provinsi','kode_pos',

        // keluarga
        'no_kk','nama_kk',
        'nama_ayah','nik_ayah','tahun_lahir_ayah','status_ayah',
        'pekerjaan_ayah','penghasilan_ayah','pendidikan_ayah','hp_ayah',

        'nama_ibu','nik_ibu','tahun_lahir_ibu','status_ibu',
        'pekerjaan_ibu','penghasilan_ibu','pendidikan_ibu','hp_ibu',

        'nama_wali','nik_wali','tahun_lahir_wali','status_wali',
        'pekerjaan_wali','penghasilan_wali','pendidikan_wali','hp_wali',

        // bantuan
        'no_kks','no_pkh','no_kip',

        // sekolah
        'nama_sekolah','jenjang_sekolah','kelas',
        'status_sekolah','npsn','alamat_sekolah',

        // file
        'foto','kk','ijazah',

        // status
        'status',

        // kategori
        'kategori',
    ];

    protected static function booted()
    {
        static::creating(function ($student) {
            if (empty($student->kategori)) {
                $student->kategori = collect(['A', 'B'])->random();
            }
        });
    }

    public function payments()
    {
        return $this->hasOne(Payment::class);
    }

    public function TagihanSPP()
    {
        return $this->hasMany(TagihanSPP::class);
    }
}
