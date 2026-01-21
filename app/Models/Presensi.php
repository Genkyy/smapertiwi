<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class Presensi extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nama', 'kelas'])
            ->logOnlyDirty()
            ->useLogName('Siswa');
    }
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
