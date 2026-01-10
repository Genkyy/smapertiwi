<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiAkademik extends Model
{
    protected $table = 'nilai_rapor';
    protected $fillable = [
        'student_id',
        'mapel',
        'nilai',
    ];

    public function siswa()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
