<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class Section extends Model
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
        'tittle',
        'thumbnail',
        'content',
        'post_as',
        'published_at',
        'author',
    ];

    /**
     * Accessor untuk mendapatkan URL thumbnail lengkap.
     * Dipanggil otomatis lewat $section->thumbnail_url
     */
    public function getThumbnailUrlAttribute(): string
    {
        // Jika kolom thumbnail kosong
        if (empty($this->thumbnail)) {
            return asset('assets/images/no-image.png');
        }

        // Normalisasi path agar aman di semua kondisi
        $path = $this->thumbnail;

        // Hapus prefix "public/" jika ada
        if (strpos($path, 'public/') === 0) {
            $path = substr($path, 7);
        }

        // Cek file di disk 'public'
        if (Storage::disk('public')->exists($path)) {
            return asset('storage/' . $path);
        }

        // Cek file langsung di public/storage (misal hasil upload manual)
        $publicPath = public_path('storage/' . $path);
        if (file_exists($publicPath)) {
            return asset('storage/' . $path);
        }

        // Jika semua gagal, pakai gambar default
        return asset('assets/images/no-image.png');
    }
}
