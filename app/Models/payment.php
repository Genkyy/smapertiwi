<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
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
