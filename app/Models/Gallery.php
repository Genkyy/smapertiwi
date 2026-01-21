<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class Gallery extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nama', 'kelas'])
            ->logOnlyDirty()
            ->useLogName('Siswa');
    }
    use HasFactory;

    protected $table = 'galleries';

    protected $fillable = [
        'tahun',
        'bulan',
        'tanggal',
        'judul',
        'deskripsi',
        'foto',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
