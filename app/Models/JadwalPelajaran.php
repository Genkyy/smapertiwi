<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class JadwalPelajaran extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nama', 'kelas'])
            ->logOnlyDirty()
            ->useLogName('Siswa');
    }
    protected $table = 'jadwal_pelajarans';

    protected $fillable = [
        'kelas',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'mata_pelajaran',
        'guru',
        'ruang',
    ];
}
