@include('layout.header')
<!DOCTYPE html>
<html lang="id" class="light">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Formulir Pendaftaran Siswa</title>

    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Noto+Sans:wght@300..800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    {{-- Tailwind --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-slate-50 text-slate-900 font-display">

<div class="mx-auto max-w-4xl px-4 py-10">
@if ($errors->any())
<div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-5 shadow-sm">
    <div class="flex items-start gap-3">
        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-red-100 text-red-600">
            <span class="material-symbols-outlined">error</span>
        </div>
        <div>
            <h4 class="font-semibold text-red-700">
                Formulir belum lengkap
            </h4>
            <ul class="mt-2 list-disc pl-5 text-sm text-red-600 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif


<form
    method="POST"
    action="{{ route('pendaftaran.store') }}"
    enctype="multipart/form-data"
    class="space-y-10"
>
    @csrf
<!-- PROGRESS -->
<!-- Progress Step -->
<div class="mb-12">
    <ol class="relative flex items-center justify-between">
        <!-- Garis -->
        <div class="absolute left-0 top-1/2 h-1 w-full -translate-y-1/2 rounded bg-slate-200"></div>
        <div id="progressLine" class="absolute left-0 top-1/2 h-1 w-0 -translate-y-1/2 rounded bg-primary transition-all duration-500"></div>

        <!-- Step 1 -->
        <li class="relative z-10 flex flex-col items-center" data-progress="1">
            <div class="step-circle active">
                <span class="material-symbols-outlined">gavel</span>
            </div>
            <span class="step-label active">Ketentuan</span>
        </li>

        <!-- Step 2 -->
        <li class="relative z-10 flex flex-col items-center" data-progress="2">
            <div class="step-circle">
                <span class="material-symbols-outlined">person</span>
            </div>
            <span class="step-label">Data Siswa</span>
        </li>

        <!-- Step 3 -->
        <li class="relative z-10 flex flex-col items-center" data-progress="3">
            <div class="step-circle">
                <span class="material-symbols-outlined">home</span>
            </div>
            <span class="step-label">Alamat</span>
        </li>

        <!-- Step 4 -->
        <li class="relative z-10 flex flex-col items-center" data-progress="4">
            <div class="step-circle">
                <span class="material-symbols-outlined">family_restroom</span>
            </div>
            <span class="step-label">Orang Tua</span>
        </li>

        <!-- Step 5 -->
        <li class="relative z-10 flex flex-col items-center" data-progress="5">
            <div class="step-circle">
                <span class="material-symbols-outlined">school</span>
            </div>
            <span class="step-label">Sekolah</span>
        </li>

        <!-- Step 6 -->
        <li class="relative z-10 flex flex-col items-center" data-progress="6">
            <div class="step-circle">
                <span class="material-symbols-outlined">check_circle</span>
            </div>
            <span class="step-label">Konfirmasi</span>
        </li>
    </ol>
</div>

<!-- Ketentuan Pendaftaran -->
<section id="step1" data-step="1" class="scroll-mt-28 rounded-xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
    <div class="mb-6 flex items-center gap-3 border-b border-slate-100 pb-4">
        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary/10 text-primary">
            <span class="material-symbols-outlined">gavel</span>
        </div>
        <h3 class="text-xl font-bold text-slate-900">Ketentuan Pendaftaran</h3>
    </div>

    <div class="mb-6 text-sm text-slate-600 space-y-3">
        <p>Mohon perhatikan ketentuan berikut sebelum melanjutkan pendaftaran:</p>
        <ul class="list-disc pl-5 space-y-2">
            <li>Data harus sesuai dengan dokumen resmi.</li>
            <li>Wajib mengunggah pas foto, KK, dan Ijazah/SKL.</li>
            <li>Pemalsuan data menyebabkan pembatalan pendaftaran.</li>
            <li>Nomor WhatsApp harus aktif.</li>
        </ul>
    </div>

    <div class="rounded-lg bg-blue-50 p-4">
        <label class="flex items-start gap-3 cursor-pointer">
            <input
                type="checkbox"
                required
                class="mt-1 h-5 w-5 rounded border-slate-300 text-primary focus:ring-primary"
            />
            <span class="text-sm font-medium text-slate-800">
                Saya telah membaca dan menyetujui seluruh ketentuan pendaftaran.
            </span>
        </label>
    </div>
    <div class="mt-6 flex justify-end">
    <button
        type="button"
        onclick="nextStep()"
        class="rounded-lg bg-primary px-6 py-2 text-sm font-bold text-white"
    >
        Lanjut
    </button>
</div>

</section>
<!-- Data siswa -->
<section id="step2" data-step="2" class="scroll-mt-28 rounded-xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
    <div class="mb-6 flex items-center gap-3 border-b border-slate-100 pb-4">
        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary/10 text-primary">
            <span class="material-symbols-outlined">person</span>
        </div>
        <h3 class="text-xl font-bold text-slate-900">Data Siswa</h3>
    </div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <!-- Nama -->
        <div class="sm:col-span-2">
            <label class="mb-2 block text-sm font-semibold">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" placeholder="Sesuai Akta Kelahiran"
                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm
                focus:border-primary focus:ring-1 focus:ring-primary" required>
        </div>

        <!-- NISN -->
        <div>
            <label class="mb-2 block text-sm font-semibold">NISN</label>
            <input type="text" name="nisn" required minlength="10" maxlength="10" placeholder="10 digit angka"
                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm
                focus:border-primary focus:ring-1 focus:ring-primary">
        </div>

        <!-- NIK -->
        <div>
            <label class="mb-2 block text-sm font-semibold">NIK</label>
            <input type="text" name="nik" required minlength="16" maxlength="16" placeholder="16 digit angka"
                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm
                focus:border-primary focus:ring-1 focus:ring-primary">
        </div>

        <!-- Tempat Lahir -->
        <div>
            <label class="mb-2 block text-sm font-semibold">Tempat Lahir</label>
            <input type="text" name="tempat_lahir"
                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm
                focus:border-primary focus:ring-1 focus:ring-primary">
        </div>

        <!-- Tanggal Lahir -->
        <div>
            <label class="mb-2 block text-sm font-semibold">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir"
                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm
                focus:border-primary focus:ring-1 focus:ring-primary">
        </div>

        <!-- Jenis Kelamin -->
        <div>
            <label class="mb-2 block text-sm font-semibold">Jenis Kelamin</label>
            <select name="jenis_kelamin"
                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm
                focus:border-primary focus:ring-1 focus:ring-primary">
                <option value="">Pilih</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <!-- Agama -->
        <div>
            <label class="mb-2 block text-sm font-semibold">Agama</label>
            <select name="agama"
                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm
                focus:border-primary focus:ring-1 focus:ring-primary">
                <option>Islam</option>
                <option>Kristen</option>
                <option>Katolik</option>
                <option>Hindu</option>
                <option>Buddha</option>
                <option>Konghucu</option>
            </select>
        </div>

        <!-- Jurusan -->
        <div>
            <label class="mb-2 block text-sm font-semibold">Jurusan Pilihan</label>
            <div class="flex gap-4">
                <label class="flex items-center gap-2 rounded-lg border border-slate-200 px-4 py-2 cursor-pointer hover:bg-slate-50">
                    <input type="radio" name="jurusan" value="IPA" class="text-primary focus:ring-primary">
                    <span class="text-sm">IPA (Saintek)</span>
                </label>
                <label class="flex items-center gap-2 rounded-lg border border-slate-200 px-4 py-2 cursor-pointer hover:bg-slate-50">
                    <input type="radio" name="jurusan" value="IPS" class="text-primary focus:ring-primary">
                    <span class="text-sm">IPS (Soshum)</span>
                </label>
            </div>
        </div>

        <!-- No HP -->
        <div>
            <label class="mb-2 block text-sm font-semibold">No HP / WhatsApp</label>
            <input type="tel" name="no_hp" placeholder="08xxxxxxxxxx"
                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm
                focus:border-primary focus:ring-1 focus:ring-primary">
        </div>

        <!-- Minat Ekskul -->
        <div class="sm:col-span-2">
            <label class="mb-2 block text-sm font-semibold">Minat Ekstrakurikuler</label>
            <input type="text" name="ekskul"
                placeholder="Contoh: Basket, Robotik, Paduan Suara"
                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm
                focus:border-primary focus:ring-1 focus:ring-primary">
        </div>
        <!-- Sumber Informasi -->
        <div class="sm:col-span-2">
            <label class="mb-2 block text-sm font-semibold">Mendapat informasi sekolah dari?</label>
            <input type="text" name="info_dari"
                placeholder="Mendapat informasi dari..."
                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm
                focus:border-primary focus:ring-1 focus:ring-primary">
        </div>
    </div>

    <!-- UPLOAD DOKUMEN -->
    <div class="mt-8 border-t border-slate-100 pt-6">
        <h4 class="mb-4 font-bold text-slate-900">Upload Dokumen</h4>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

            <!-- PAS FOTO -->
            <label class="group relative flex cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 p-6 transition hover:border-primary hover:bg-blue-50">
                <input type="file" name="foto" accept="image/*" class="hidden">
                <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-full bg-white shadow-sm">
                    <span class="material-symbols-outlined text-slate-500 group-hover:text-primary">account_box</span>
                </div>
                <p class="text-xs font-medium text-slate-600">Pas Foto</p>
                <p class="text-[10px] text-slate-400">Max 2MB (JPG/PNG)</p>
            </label>

            <!-- KK -->
            <label class="group relative flex cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 p-6 transition hover:border-primary hover:bg-blue-50">
                <input type="file" name="kk" accept="image/*,application/pdf" class="hidden">
                <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-full bg-white shadow-sm">
                    <span class="material-symbols-outlined text-slate-500 group-hover:text-primary">folder_shared</span>
                </div>
                <p class="text-xs font-medium text-slate-600">Kartu Keluarga (KK)</p>
                <p class="text-[10px] text-slate-400">Max 2MB (PDF/IMG)</p>
            </label>

            <!-- IJAZAH -->
            <label class="group relative flex cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 p-6 transition hover:border-primary hover:bg-blue-50">
                <input type="file" name="ijazah" accept="image/*,application/pdf" class="hidden">
                <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-full bg-white shadow-sm">
                    <span class="material-symbols-outlined text-slate-500 group-hover:text-primary">school</span>
                </div>
                <p class="text-xs font-medium text-slate-600">Ijazah / SKL</p>
                <p class="text-[10px] text-slate-400">Max 2MB (PDF/IMG)</p>
            </label>

        </div>
    </div>
    <div class="mt-6 flex justify-between">
    <button
        type="button"
        onclick="prevStep()"
        class="rounded-lg border px-6 py-2 text-sm font-bold"
    >
        Kembali
    </button>

    <button
        type="button"
        onclick="nextStep()"
        class="rounded-lg bg-primary px-6 py-2 text-sm font-bold text-white"
    >
        Lanjut
    </button>
</div>

</section>
<!-- Alamat calon siswa -->
    <section
    id="step3" data-step="3"
    class="scroll-mt-28 rounded-xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8"
>
    <div class="mb-6 flex items-center gap-3 border-b border-slate-100 pb-4">
        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary/10 text-primary">
            <span class="material-symbols-outlined">home_pin</span>
        </div>
        <h3 class="text-xl font-bold text-slate-900">
            Alamat Calon Siswa
        </h3>
    </div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <!-- Alamat -->
        <div class="sm:col-span-2">
            <label class="mb-2 block text-sm font-semibold">Alamat Lengkap</label>
            <textarea
                name="alamat"
                rows="3"
                placeholder="Nama Jalan, RT/RW, Dusun"
                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm
                       focus:border-primary focus:ring-1 focus:ring-primary" required
            ></textarea>
        </div>

        <!-- Provinsi -->
        <div>
            <label class="mb-2 block text-sm font-semibold">Provinsi</label>
            <input type="text" name="provinsi" rows="3" placeholder="Provinsi"
                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm
                       focus:border-primary focus:ring-1 focus:ring-primary" required
            />
        </div>

        <!-- Kota -->
        <div>
            <label class="mb-2 block text-sm font-semibold">Kabupaten / Kota</label>
            <input type="text" name="kabupaten" rows="3" placeholder="Kota/kabupaten"
                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm
                       focus:border-primary focus:ring-1 focus:ring-primary" required
            />
        </div>

        <!-- Kecamatan -->
        <div>
            <label class="mb-2 block text-sm font-semibold">Kecamatan</label>
            <input
                type="text"
                name="kecamatan"
                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm
                       focus:border-primary focus:ring-1 focus:ring-primary" required
            />
        </div>

        <!-- Kode Pos -->
        <div>
            <label class="mb-2 block text-sm font-semibold">Kode Pos</label>
            <input
                type="text"
                name="kode_pos"
                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm
                       focus:border-primary focus:ring-1 focus:ring-primary" required
            />
        </div>
    </div>
    <div class="mt-6 flex justify-between">
    <button
        type="button"
        onclick="prevStep()"
        class="rounded-lg border px-6 py-2 text-sm font-bold"
    >
        Kembali
    </button>

    <button
        type="button"
        onclick="nextStep()"
        class="rounded-lg bg-primary px-6 py-2 text-sm font-bold text-white"
    >
        Lanjut
    </button>
</div>

</section>
<!-- Data Orang Tua & Wali -->
<section
    id="step4" data-step="4"
    class="scroll-mt-28 rounded-xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8"
>
    <!-- Header -->
    <div class="mb-6 flex items-center gap-3 border-b border-slate-100 pb-4">
        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary/10 text-primary">
            <span class="material-symbols-outlined">family_restroom</span>
        </div>
        <h3 class="text-xl font-bold text-slate-900">
            Identitas Orang Tua &amp; Wali
        </h3>
    </div>

    <div class="space-y-8">

        <!-- Data KK -->
        <div class="rounded-lg bg-slate-50 p-5">
            <h4 class="mb-4 text-base font-bold text-slate-900">Data Kartu Keluarga</h4>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <input type="text" name="no_kk" placeholder="Nomor KK"
                    class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-primary focus:ring-1 focus:ring-primary">
                <input type="text" name="nama_kk" placeholder="Nama Kepala Keluarga"
                    class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-primary focus:ring-1 focus:ring-primary">
            </div>
        </div>

        <!-- Ayah -->
        <div>
            <h4 class="mb-4 font-bold text-slate-900">Data Ayah Kandung</h4>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <input type="text" name="nama_ayah" placeholder="Nama Ayah" class="input">
                <input type="text" name="nik_ayah" placeholder="NIK Ayah" class="input">
                <input type="number" name="tahun_lahir_ayah" placeholder="Tahun Lahir" class="input">
                <input type="text" name="status_ayah" placeholder="Status Ayah" class="input">
                <select name="pekerjaan_ayah" class="input">
                    <option value="">Pekerjaan</option>
                    <option>PNS</option>
                    <option>Wiraswasta</option>
                </select>
                <select name="penghasilan_ayah" class="input">
                    <option value="">Penghasilan</option>
                    <option>&lt; 2 Juta</option>
                    <option>2 - 5 Juta</option>
                </select>
                <select name="pendidikan_ayah" class="input">
                    <option value="">Pendidikan</option>
                    <option>SMA</option>
                    <option>S1</option>
                </select>
                <input type="tel" name="hp_ayah" placeholder="No HP Ayah" class="input">
            </div>
        </div>

        <!-- Ibu -->
        <div>
            <h4 class="mb-4 font-bold text-slate-900">Data Ibu Kandung</h4>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <input type="text" name="nama_ibu" placeholder="Nama Ibu" class="input">
                <input type="text" name="nik_ibu" placeholder="NIK Ibu" class="input">
                <input type="number" name="tahun_lahir_ibu" placeholder="Tahun Lahir" class="input">
                <input type="text" name="status_ibu" placeholder="Status Ibu" class="input">
                <select name="pekerjaan_ibu" class="input">
                    <option value="">Pekerjaan</option>
                    <option>Ibu Rumah Tangga</option>
                    <option>PNS</option>
                </select>
                <select name="penghasilan_ibu" class="input">
                    <option value="">Penghasilan</option>
                    <option>Tidak Berpenghasilan</option>
                    <option>&lt; 2 Juta</option>
                </select>
                <select name="pendidikan_ibu" class="input">
                    <option value="">Pendidikan</option>
                    <option>SMA</option>
                    <option>S1</option>
                </select>
                <input type="tel" name="hp_ibu" placeholder="No HP Ibu" class="input">
            </div>
        </div>

        <!-- Wali -->
        <div>
            <h4 class="mb-4 font-bold text-slate-900">Data Wali (Jika Ada)</h4>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <input type="text" name="nama_wali" placeholder="Nama Wali" class="input">
                <input type="text" name="nik_wali" placeholder="NIK Wali" class="input">
                <input type="number" name="tahun_lahir_wali" placeholder="Tahun Lahir" class="input">
                <input type="text" name="status_wali" placeholder="Status Wali" class="input">
                <select name="pekerjaan_wali" class="input">
                    <option value="">Pekerjaan</option>
                    <option>PNS</option>
                    <option>Wiraswasta</option>
                </select>
                <select name="penghasilan_wali" class="input">
                    <option value="">Penghasilan</option>
                    <option>&lt; 2 Juta</option>
                    <option>2 - 5 Juta</option>
                </select>
                <select name="pendidikan_wali" class="input">
                    <option value="">Pendidikan</option>
                    <option>SMA</option>
                    <option>S1</option>
                </select>
                <input type="tel" name="hp_wali" placeholder="No HP Wali" class="input">
            </div>
        </div>

        <!-- Kartu Bantuan -->
        <div class="rounded-lg border border-orange-200 bg-orange-50 p-5">
            <h4 class="mb-4 font-bold text-orange-900">Kartu Bantuan (Jika Ada)</h4>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                <input type="text" name="no_kks" placeholder="Nomor KKS" class="input">
                <input type="text" name="no_pkh" placeholder="Nomor PKH" class="input">
                <input type="text" name="no_kip" placeholder="Nomor KIP" class="input">
            </div>
        </div>

    </div>
    <div class="mt-6 flex justify-between">
    <button
        type="button"
        onclick="prevStep()"
        class="rounded-lg border px-6 py-2 text-sm font-bold"
    >
        Kembali
    </button>

    <button
        type="button"
        onclick="nextStep()"
        class="rounded-lg bg-primary px-6 py-2 text-sm font-bold text-white"
    >
        Lanjut
    </button>
</div>

</section>
<!-- data sekolah asal -->
<section
    id="step5" data-step="5"
    class="scroll-mt-28 rounded-xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8"
>
    <div class="mb-6 flex items-center gap-3 border-b border-slate-100 pb-4">
        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary/10 text-primary">
            <span class="material-symbols-outlined">school</span>
        </div>
        <h3 class="text-xl font-bold text-slate-900">
            Data Sekolah Asal
        </h3>
    </div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

        <!-- Nama Sekolah -->
        <div class="sm:col-span-2">
            <label class="mb-2 block text-sm font-semibold">Nama Sekolah Asal</label>
            <input
                type="text"
                name="nama_sekolah"
                placeholder="SMP / MTs ..."
                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm
                       focus:border-primary focus:ring-1 focus:ring-primary"
            />
        </div>

        <!-- Jenjang -->
        <div>
            <label class="mb-2 block text-sm font-semibold">Jenjang</label>
            <select
                name="jenjang_sekolah"
                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm
                       focus:border-primary focus:ring-1 focus:ring-primary"
            >
                <option>SMP</option>
                <option>MTs</option>
                <option>Paket B</option>
            </select>
        </div>

        <!-- Kelas -->
        <div>
            <label class="mb-2 block text-sm font-semibold">Kelas Terakhir</label>
            <input
                type="text"
                name="kelas"
                placeholder="Contoh: IX"
                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm
                       focus:border-primary focus:ring-1 focus:ring-primary"
            />
        </div>

        <!-- Status Sekolah -->
        <div>
            <label class="mb-2 block text-sm font-semibold">Status Sekolah</label>
            <select
                name="status_sekolah"
                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm
                       focus:border-primary focus:ring-1 focus:ring-primary"
            >
                <option>Negeri</option>
                <option>Swasta</option>
            </select>
        </div>

        <!-- NPSN -->
        <div>
            <label class="mb-2 block text-sm font-semibold">NPSN</label>
            <input
                type="text"
                name="npsn"
                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm
                       focus:border-primary focus:ring-1 focus:ring-primary"
            />
        </div>

        <!-- Alamat Sekolah -->
        <div class="sm:col-span-2">
            <label class="mb-2 block text-sm font-semibold">Alamat Sekolah</label>
            <input
                type="text"
                name="alamat_sekolah"
                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm
                       focus:border-primary focus:ring-1 focus:ring-primary"
            />
        </div>

    </div>
    <div class="mt-6 flex justify-between">
    <button
        type="button"
        onclick="prevStep()"
        class="rounded-lg border px-6 py-2 text-sm font-bold"
    >
        Kembali
    </button>

    <button
        type="button"
        onclick="nextStep()"
        class="rounded-lg bg-primary px-6 py-2 text-sm font-bold text-white"
    >
        Lanjut
    </button>
</div>

</section>



<section
    id="step6" data-step="6"
    class="scroll-mt-28 rounded-xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8"
>
    <div class="mb-6 flex items-center gap-3 border-b border-slate-100 pb-4">
        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary/10 text-primary">
            <span class="material-symbols-outlined">verified</span>
        </div>
        <h3 class="text-xl font-bold text-slate-900">
            Konfirmasi &amp; Kirim
        </h3>
    </div>

    <!-- INFO BOX -->
    <div class="mb-6 rounded-lg border border-green-100 bg-green-50 p-4">
        <div class="flex gap-3">
            <span class="material-symbols-outlined text-green-600">info</span>
            <div class="text-sm text-green-800">
                <p class="mb-1 font-bold">Cek Kembali Data Anda</p>
                <p>
                    Pastikan seluruh data yang anda masukkan sudah benar.
                    Data yang sudah disubmit tidak dapat diubah kembali kecuali
                    dengan menghubungi panitia PPDB.
                </p>
            </div>
        </div>
    </div>

    <!-- PERNYATAAN -->
    <div class="mb-8">
        <label class="flex cursor-pointer select-none items-start gap-3">
            <input
                type="checkbox"
                name="pernyataan"
                required
                class="mt-1 h-5 w-5 rounded border-slate-300 text-primary focus:ring-primary"
            />
            <span class="text-base font-medium text-slate-800">
                Saya menyatakan bahwa data yang saya isikan adalah benar dan saya
                bertanggung jawab sepenuhnya atas kebenaran data tersebut.
            </span>
        </label>
    </div>

    <!-- ACTION -->
    <div class="flex flex-col gap-4 sm:flex-row sm:justify-end">
        <button
            type="button"
            class="w-full rounded-lg border border-slate-300 bg-white px-6 py-3 text-sm font-bold text-slate-700 transition hover:bg-slate-50 sm:w-auto"
        >
            Simpan Draft
        </button>

        <button
            type="submit"
            class="flex w-full items-center justify-center gap-2 rounded-lg bg-primary px-8 py-3 text-sm font-bold text-white shadow-sm transition hover:opacity-90 sm:w-auto"
        >
            <span>Kirim Pendaftaran</span>
            <span class="material-symbols-outlined text-sm">send</span>
        </button>
    </div>
</section>
</form>

</div>
<style>
.step-circle {
    @apply flex h-12 w-12 items-center justify-center rounded-full border-2 border-slate-300 bg-white text-slate-400 transition-all duration-300;
}

.step-circle.active {
    @apply border-primary bg-primary text-white shadow-lg scale-110;
}

.step-circle.done {
    @apply border-emerald-500 bg-emerald-500 text-white;
}

.step-label {
    @apply mt-3 text-xs font-semibold text-slate-400;
}

.step-label.active {
    @apply text-primary;
}

.step-label.done {
    @apply text-emerald-600;
}
</style>

<script>
let currentStep = 1;
const totalSteps = 6;

function showStep(step) {
    document.querySelectorAll('section[data-step]').forEach(section => {
        section.classList.toggle('hidden', section.dataset.step != step);
    });

    // update progress
    document.querySelectorAll('[data-progress]').forEach(item => {
        const circle = item.querySelector('div');

        if (item.dataset.progress <= step) {
            circle.classList.remove('border-primary','bg-white');
            circle.classList.add('bg-primary','text-white');
        } else {
            circle.classList.remove('bg-primary','text-white');
            circle.classList.add('border-primary','bg-white');
        }
    });
}

function nextStep() {
    if (currentStep < totalSteps) {
        currentStep++;
        showStep(currentStep);
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
}

function prevStep() {
    if (currentStep > 1) {
        currentStep--;
        showStep(currentStep);
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
}

// init
showStep(currentStep);
</script>


</body>
</html>
@include('layout.footer')