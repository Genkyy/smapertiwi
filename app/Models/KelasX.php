<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasX extends Model
{
    protected $table = 'nilai_rapor';

    protected $fillable = [
        'student_id',
        'semester',
        'tahun_ajaran',

        'pai','ppkn','bahasa_indonesia','matematika',
        'bahasa_inggris','sejarah','informatika ','pjok',

        'pramuka','osis','ekskul',

        'disiplin','tanggung_jawab','sopan_santun',

        'sakit','izin','alpha',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}

