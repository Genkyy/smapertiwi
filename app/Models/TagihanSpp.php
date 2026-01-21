<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class TagihanSpp extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'tagihan_spp';

    protected $fillable = [
        'student_id',
        'bulan',
        'tahun_ajaran',
        'nominal',
        'status',
        'jatuh_tempo',
    ];

    /**
     * ACTIVITY LOG CONFIG
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Tagihan SPP')
            ->logOnly([
                'student_id',
                'bulan',
                'tahun_ajaran',
                'nominal',
                'status',
            ])
            ->logOnlyDirty();
    }

    /**
     * BAYAR BEBERAPA BULAN SEKALIGUS
     */
    public static function bayarBeberapaBulan(
        int $studentId,
        array $bulanList,
        string $tahunAjaran,
        int $nominalPerBulan = 250000
    ): void {
        foreach ($bulanList as $bulan) {

            // Terima nama bulan dalam Bahasa Indonesia atau angka bulan (1-12)
            $monthMap = [
                'januari' => 1,
                'februari' => 2,
                'maret' => 3,
                'april' => 4,
                'mei' => 5,
                'juni' => 6,
                'juli' => 7,
                'agustus' => 8,
                'september' => 9,
                'oktober' => 10,
                'november' => 11,
                'desember' => 12,
            ];

            if (is_numeric($bulan)) {
                $monthNumber = (int) $bulan;
            } else {
                $lower = strtolower(trim($bulan));
                $monthNumber = $monthMap[$lower] ?? null;
            }

            if (! $monthNumber || $monthNumber < 1 || $monthNumber > 12) {
                // fallback: gunakan bulan saat ini
                $monthNumber = now()->month;
            }

            $jatuhTempo = Carbon::create(now()->year, $monthNumber, 10);

            $tagihan = static::updateOrCreate(
                [
                    'student_id'   => $studentId,
                    'bulan'        => $bulan,
                    'tahun_ajaran' => $tahunAjaran,
                ],
                [
                    'nominal'     => $nominalPerBulan,
                    'status'      => 'paid',
                    'jatuh_tempo' => $jatuhTempo,
                ]
            );

            // Buat entry activity jika ada perubahan atau record baru
            if ($tagihan->wasRecentlyCreated || $tagihan->wasChanged()) {
                $message = $tagihan->wasRecentlyCreated ? 'Menambahkan Tagihan SPP' : 'Memperbarui Tagihan SPP';

                $logger = activity()
                    ->performedOn($tagihan)
                    ->withProperties([
                        'student_id' => $studentId,
                        'bulan' => $bulan,
                        'tahun_ajaran' => $tahunAjaran,
                        'nominal' => $nominalPerBulan,
                    ]);

                if ($user = auth()->user()) {
                    $logger = $logger->causedBy($user);
                }

                $logger->log($message);
            }
        }
    }

    /**
     * RELATIONS
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
