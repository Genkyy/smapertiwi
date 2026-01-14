<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuruStaff extends Model
{
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
