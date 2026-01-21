<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class KelasXI extends Model
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
        'semester',
        'tahun_ajaran',

        'pai','ppkn','bahasa_indonesia','matematika',
        'bahasa_inggris','sejarah','informatika','pjok',

        'pramuka','osis','ekskul',

        'disiplin','tanggung_jawab','sopan_santun',

        'sakit','izin','alpha',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}