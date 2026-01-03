<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $table = 'presensi'; 

    protected $fillable = [
        'student_id',
        'tanggal',
        'status',
    ];

    public function siswa()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
