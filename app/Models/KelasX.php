<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasX extends Model
{
    protected $table = 'nilai_akademik';
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
