<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PembayaranSpp;

class PembayaranSpp extends Model
{
    protected $table = 'pembayaran_spp';

    protected $fillable = [
        'tagihan_spp_id',
        'invoice',
        'amount',
        'method',
        'proof',
        'status',
        'paid_at',
    ];
    public function tagihan()
    {
        return $this->belongsTo(TagihanSpp::class, 'tagihan_spp_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
