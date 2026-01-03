<x-filament::card>
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-lg font-bold">Agenda & Informasi</h3>
        <span class="text-sm text-primary font-medium">Lihat Semua</span>
    </div>

    <div class="space-y-4">
        @foreach ($agendas as $agenda)
            <div class="flex gap-4 items-start">
                <div class="flex flex-col items-center min-w-[60px] bg-gray-100 dark:bg-gray-800 rounded-lg p-2 border">
                    <span class="text-xs font-bold text-red-500 uppercase">
                        {{ \Carbon\Carbon::parse($agenda->tanggal)->format('M') }}
                    </span>
                    <span class="text-xl font-bold">
                        {{ \Carbon\Carbon::parse($agenda->tanggal)->format('d') }}
                    </span>
                </div>

                <div class="flex-1 border-b pb-4">
                    <div class="flex justify-between items-start">
                        <h4 class="font-bold text-sm">
                            {{ $agenda->judul }}
                        </h4>

                        <span class="text-xs px-2 py-1 rounded bg-primary/10 text-primary">
                            {{ ucfirst($agenda->kategori) }}
                        </span>
                    </div>

                    <p class="text-xs text-gray-500 mt-1">
                        {{ $agenda->deskripsi }}
                    </p>

                    @if($agenda->jam_mulai)
                        <div class="flex items-center gap-1 text-xs text-gray-500 mt-1">
                            🕒 {{ $agenda->jam_mulai }} - {{ $agenda->jam_selesai }}
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</x-filament::card>
