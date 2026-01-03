<x-filament::page>
    <div class="space-y-6">

        <h2 class="text-xl font-bold">
            Akademik & Nilai
        </h2>

        <x-filament::card>
            <p class="text-sm text-gray-600">
                Halaman ini digunakan untuk menampilkan data akademik siswa seperti nilai, peringkat, dan catatan akademik.
            </p>

            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-filament::input.wrapper label="Rata-rata Nilai">
                    <x-filament::input type="text" disabled placeholder="Belum tersedia" />
                </x-filament::input.wrapper>

                <x-filament::input.wrapper label="Peringkat Kelas">
                    <x-filament::input type="text" disabled placeholder="Belum tersedia" />
                </x-filament::input.wrapper>
            </div>
        </x-filament::card>

    </div>
</x-filament::page>
