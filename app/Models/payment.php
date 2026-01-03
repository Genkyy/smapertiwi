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
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
