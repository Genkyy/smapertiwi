<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Student;
use App\Models\TagihanSpp;
use Carbon\Carbon;

class GenerateTagihanSpp extends Command
{
    protected $signature = 'spp:generate';
    protected $description = 'Generate tagihan SPP bulanan untuk semua siswa aktif';

    public function handle()
    {
        $bulan = Carbon::now()->translatedFormat('F');
        $tahunAjaran = '2025/2026';
        $jatuhTempo = Carbon::now()->endOfMonth();

        $this->info("Generate SPP bulan {$bulan}");

        $count = 0;

        foreach (Student::where('status', 'aktif')->get() as $siswa) {

            $exists = TagihanSpp::where('student_id', $siswa->id)
                ->where('bulan', $bulan)
                ->where('tahun_ajaran', $tahunAjaran)
                ->exists();

            if (! $exists) {
                TagihanSpp::create([
                    'student_id'   => $siswa->id,
                    'bulan'        => $bulan,
                    'tahun_ajaran' => $tahunAjaran,
                    'nominal'      => 250000,
                    'status'       => 'unpaid',
                    'jatuh_tempo'  => $jatuhTempo,
                ]);

                $count++;
            }
        }

        $this->info("Selesai. {$count} tagihan dibuat.");
    }
}
