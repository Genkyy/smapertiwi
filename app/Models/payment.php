<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class Payment extends Model
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
        'student_id',
        'invoice',
        'amount',
        'method',
        'proof',
        'status',
        'note',
    ];

    protected $casts = [
        'status' => 'string',
    ];
public function payments()
{
    return $this->hasMany(Payment::class);
}

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
