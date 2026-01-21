<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class CalendarEvent extends Model
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

    protected $fillable = [
        'judul',
        'kategori',
        'tanggal',
    ];

    protected $casts = [
        'tanggal' => 'date', // otomatis ubah ke Carbon
    ];
}
