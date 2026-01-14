<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TagihanSpp;

class TagihanSpp extends Model
{
    protected $table = 'tagihan_spp';

    protected $fillable = [
        'student_id',
        'bulan',
        'tahun_ajaran',
        'nominal',
        'status',
        'jatuh_tempo',
    ];
    
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
