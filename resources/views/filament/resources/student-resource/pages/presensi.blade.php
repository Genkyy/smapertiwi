<x-filament::page>
    <div class="space-y-6">

        <h2 class="text-xl font-bold">
            Presensi Siswa
        </h2>

        <x-filament::card>
            <p class="text-sm text-gray-600">
                Rekap kehadiran siswa selama semester berjalan.
            </p>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                <x-filament::badge color="success">
                    Hadir: 0
                </x-filament::badge>

                <x-filament::badge color="warning">
                    Izin: 0
                </x-filament::badge>

                <x-filament::badge color="danger">
                    Alpha: 0
                </x-filament::badge>

                <x-filament::badge color="info">
                    Sakit: 0
                </x-filament::badge>
            </div>
        </x-filament::card>

    </div>
</x-filament::page>
