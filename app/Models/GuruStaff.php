<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class GuruStaff extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nama', 'kelas'])
            ->logOnlyDirty()
            ->useLogName('Siswa');
    }
    protected $fillable = [
        'nama',
        'nip',
        'jenis_kelamin',
        'email',
        'no_hp',
        'jabatan',
        'aktif',
        'foto',
    ];

    public function assignments()
    {
        return $this->hasMany(TeacherAssignment::class);
    }
}
