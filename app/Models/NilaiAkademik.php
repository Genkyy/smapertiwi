<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class NilaiAkademik extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nama', 'kelas'])
            ->logOnlyDirty()
            ->useLogName('Siswa');
    }
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
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
