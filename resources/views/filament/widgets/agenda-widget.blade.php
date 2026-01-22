<x-filament::card class="p-0">
    {{-- HEADER --}}
    <div class="px-6 py-4 border-b">
        <h3 class="text-lg font-bold">
            Agenda & Kegiatan
        </h3>
    </div>

    {{-- LIST AGENDA --}}
    <div class="divide-y">
        @foreach ($agendas as $agenda)
            <div class="flex gap-4 px-6 py-4">
                {{-- TANGGAL --}}
                <div class="flex flex-col items-center justify-center
                            w-16 h-16 rounded-xl bg-gray-100 dark:bg-gray-800">
                    <span class="text-xs font-semibold uppercase text-gray-500">
                        {{ \Carbon\Carbon::parse($agenda->tanggal)->format('M') }}
                    </span>
                    <span class="text-xl font-bold text-gray-900 dark:text-white">
                        {{ \Carbon\Carbon::parse($agenda->tanggal)->format('d') }}
                    </span>
                </div>

                {{-- KONTEN --}}
                <div class="flex-1 space-y-1">
                    <h4 class="font-semibold text-base">
                        {{ $agenda->judul }}
                    </h4>

                    <div class="flex items-center text-sm text-gray-500 gap-2">
                        <span>🕒</span>
                        <span>
                            {{ $agenda->jam_mulai ?? '00:00' }}
                            -
                            {{ $agenda->jam_selesai ?? 'Selesai' }}
                            • {{ $agenda->lokasi ?? 'Lokasi' }}
                        </span>
                    </div>

                    {{-- BADGE / EXTRA --}}
                    <div class="flex items-center gap-2 mt-2">
                        @if($agenda->kategori === 'penting')
                            <span class="text-xs font-semibold px-3 py-1 rounded-full
                                         bg-green-100 text-green-700">
                                PENTING
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- FOOTER --}}
    <div class="px-6 py-4 border-t text-center">
        <a href="#"
           class="text-sm font-semibold text-primary hover:underline">
            BUKA KALENDER PENUH
        </a>
    </div>
</x-filament::card>
