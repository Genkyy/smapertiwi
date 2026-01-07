@include('layout.header')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>Pembayaran Pendaftaran</title>

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Material Symbols --}}
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>

    {{-- Tailwind --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --primary: 142 82% 17%; /* #084f24 */
        }
    </style>
</head>
<body class="bg-slate-100">
<div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
<!-- Navigation -->

<main class="flex-grow w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
<!-- Breadcrumbs -->
<nav aria-label="Breadcrumb" class="mb-8 flex">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">

        <!-- Step 1 -->
        <li class="inline-flex items-center">   
            <a
                href="#"
                class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-primary dark:text-slate-400"
            >
                Pendaftaran
            </a>
        </li>

        <!-- Step 2 (Active) -->
        <li>
            <div class="flex items-center">
                <span class="material-symbols-outlined mx-2 text-sm text-slate-400">
                    chevron_right
                </span>
                <span
                    class="rounded bg-primary/10 px-2 py-1 text-sm font-bold text-primary dark:text-primary"
                >
                    Pembayaran
                </span>
            </div>
        </li>

        <!-- Step 3 -->
        <li>
            <div class="flex items-center">
                <span class="material-symbols-outlined mx-2 text-sm text-slate-400">
                    chevron_right
                </span>
                <span class="text-sm font-medium text-slate-500 dark:text-slate-400">
                    Konfirmasi
                </span>
            </div>
        </li>

    </ol>
</nav>

<!-- Page Header -->
<div class="mb-10 flex flex-col justify-between gap-4 md:flex-row md:items-end">
    <div>
        <h1
            class="mb-3 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-black sm:text-4xl"
        >
          Selesaikan Pembayaran
        </h1>
        <p
            class="max-w-2xl text-lg text-slate-600 dark:text-slate-500"
        >
        Silahkan pilih metode pembayaran dan unggah bukti transfer Anda untuk melanjutkan slot pendaftaran Anda.    
        </p>
    </div>
</div>
<div class="grid grid-cols-1 items-start gap-8 lg:grid-cols-12">

    <!-- Left Column: Payment Methods -->
    <div class="space-y-6 lg:col-span-7">
        <section>

            <div class="mb-4 flex items-center justify-between">
                <h2
                    class="flex items-center gap-2 text-xl font-bold text-slate-900 dark:text-black"
                >
                    <span class="material-symbols-outlined text-primary">
                        credit_card
                    </span>
                    Metode pembayaran
                </h2>

                <span
                    class="rounded-full bg-slate-100 px-3 py-1 text-sm text-slate-500 dark:bg-slate-800 dark:text-slate-400"
                >
                    Secure SSL
                </span>
            </div>

<!-- Grid -->
<div class="grid grid-cols-2 gap-4 sm:grid-cols-3">

    <!-- Card 1: E-Wallet -->
    <div
        class="group relative flex cursor-pointer flex-col items-center justify-center gap-3 rounded-xl border-2 border-primary bg-primary/5 p-6 text-center shadow-md ring-2 ring-primary/30 dark:bg-slate-100"
        onclick="selectMethod('ewallet')"
        data-method="ewallet"
    >
        <div
            class="flex h-12 w-12 items-center justify-center rounded-full bg-primary text-white transition-transform group-hover:scale-110 dark:bg-primary"
        >
            <span class="material-symbols-outlined text-3xl">smartphone</span>
        </div>

        <div>
            <h3 class="font-bold text-slate-900 group-hover:text-primary dark:text-slate-700">
                E-Wallet
            </h3>
            <p class="text-xs text-slate-500 dark:text-slate-400">
                OVO, GoPay, DANA, ShoopePay
            </p>
        </div>
    </div>

    <!-- Card 2: BRI -->
    <div
        class="group relative flex cursor-pointer flex-col items-center justify-center gap-3 rounded-xl border-2 border-primary bg-primary/5 p-6 text-center shadow-md ring-2 ring-primary/30 dark:bg-slate-100"
        onclick="selectMethod('bri')"
        data-method="bri"
    >
        <div
            class="flex h-12 w-12 items-center justify-center rounded-full bg-primary text-white transition-transform group-hover:scale-110 dark:bg-primary"
        >
            <span class="material-symbols-outlined text-3xl">account_balance</span>
        </div>

        <div>
            <h3 class="font-bold text-slate-900 group-hover:text-primary dark:text-slate-700">
                Bank BRI
            </h3>
            <p class="text-xs text-slate-500 dark:text-slate-400">
                Virtual Account
            </p>
        </div>
    </div>

    <!-- Card 3: BCA (Active) -->
    <div
        class="group relative flex cursor-pointer flex-col items-center justify-center gap-3 rounded-xl border-2 border-primary bg-primary/5 p-6 text-center shadow-md ring-2 ring-primary/30 dark:bg-slate-100"
        onclick="selectMethod('bca')"
        data-method="bca"
    >
        <div
            class="absolute -right-2 -top-2 flex h-6 w-6 items-center justify-center rounded-full bg-primary text-white shadow-sm ring-2 ring-white dark:ring-slate-900"
        >
            <span class="material-symbols-outlined text-sm font-bold">check</span>
        </div>

        <div
            class="flex h-12 w-12 items-center justify-center rounded-full bg-primary text-white dark:bg-primary"
        >
            <span class="material-symbols-outlined text-3xl">account_balance</span>
        </div>

        <div>
            <h3 class="font-bold text-primary dark:text-slate-700">Bank BCA</h3>
            <p class="text-xs dark:text-slate-400">Virtual Account</p>
        </div>
    </div>

    <!-- Card 4: Mandiri -->
    <div
        class="group relative flex cursor-pointer flex-col items-center justify-center gap-3 rounded-xl border-2 border-primary bg-primary/5 p-6 text-center shadow-md ring-2 ring-primary/30 dark:bg-slate-100"
        onclick="selectMethod('mandiri')"
        data-method="mandiri"
    >
        <div
            class="flex h-12 w-12 items-center justify-center rounded-full bg-primary text-white transition-transform group-hover:scale-110 dark:bg-primary"
        >
            <span class="material-symbols-outlined text-3xl">account_balance</span>
        </div>

        <div>
            <h3 class="font-bold text-slate-900 group-hover:text-primary dark:text-slate-700">
                Mandiri
            </h3>
            <p class="text-xs text-slate-500 dark:text-slate-400">
                Virtual Account
            </p>
        </div>
    </div>

    <!-- Card 5: BNI -->
    <div
        class="group relative flex cursor-pointer flex-col items-center justify-center gap-3 rounded-xl border-2 border-primary bg-primary/5 p-6 text-center shadow-md ring-2 ring-primary/30 dark:bg-slate-100"
        onclick="selectMethod('bni')"
        data-method="bni"
    >
        <div
            class="flex h-12 w-12 items-center justify-center rounded-full bg-primary text-white transition-transform group-hover:scale-110 dark:bg-primary"
        >
            <span class="material-symbols-outlined text-3xl">account_balance</span>
        </div>

        <div>
            <h3 class="font-bold text-slate-900 group-hover:text-primary dark:text-slate-700">
                Bank BNI
            </h3>
            <p class="text-xs text-slate-500 dark:text-slate-400">
                Virtual Account
            </p>
        </div>
    </div>

    <!-- Card 6: QRIS -->
    <div
        class="group relative flex cursor-pointer flex-col items-center justify-center gap-3 rounded-xl border-2 border-primary bg-primary/5 p-6 text-center shadow-md ring-2 ring-primary/30 dark:bg-slate-100"
        onclick="selectMethod('qris')"
        data-method="qris"
    >
        <div
            class="flex h-12 w-12 items-center justify-center rounded-full bg-primary text-white transition-transform group-hover:scale-110 dark:bg-primary"
        >
            <span class="material-symbols-outlined text-3xl">qr_code_2</span>
        </div>

        <div>
            <h3 class="font-bold text-slate-900 group-hover:text-primary dark:text-slate-700">
                QRIS
            </h3>
            <p class="text-xs text-slate-500 dark:text-slate-400">
                Scan QR
            </p>
        </div>
    </div>
</div>
</section>
<!-- Instructions Accordion / List -->
<section
    class="rounded-xl border border-slate-200 bg-slate-50 p-6
           shadow-[0_4px_12px_rgba(0,0,0,0.06)]
           dark:border-slate-700 dark:bg-slate-900"
    id="payment-instructions"
>
    <!-- HEADER -->
    <div
        class="mb-4 flex items-center gap-2 text-slate-900 dark:text-slate-100"
    >
        <span
            class="material-symbols-outlined rounded-full
                   bg-primary/10 p-1 text-primary"
        >
            info
        </span>
        <h3 class="text-lg font-bold" id="instructions-title">
            Petunjuk Pembayaran (BCA)
        </h3>
    </div>

    <!-- CONTENT -->
    <div
        class="ml-2 border-l-4 border-primary/30 pl-4"
        id="instructions-content"
    >
        <ol
            class="list-inside list-decimal space-y-4 text-sm
                   text-slate-600 dark:text-slate-300"
        >
            <li class="pl-2">
                <span class="font-semibold text-slate-900 dark:text-slate-100">
                    ATM / Mobile Banking:
                </span>
                buka aplikasi <span class="font-medium">m-BCA</span>.
            </li>

            <li class="pl-2">
                Pilih menu
                <span class="font-semibold text-primary">
                    m-Transfer
                </span>
                &gt;
                <span class="font-semibold text-primary">
                    BCA Virtual Account
                </span>.
            </li>

            <li class="pl-2">
                Masukkan nomor <span class="font-medium">Virtual Account</span>
                yang ditampilkan pada panel kanan.
            </li>

            <li class="pl-2">
                Masukkan jumlah pembayaran sebesar
                <strong class="text-slate-900 dark:text-slate-100">
                    "PembayaranSekolah"
                </strong>
                dan pastikan total pembayaran sesuai
                <strong class="text-primary">
                    Rp 2.500.000
                </strong>.
            </li>

            <li class="pl-2">
                Setujui transaksi dan masukkan PIN m-BCA Anda.
                <span class="font-semibold text-primary">
                    Simpan bukti pembayaran
                </span>.
            </li>
        </ol>
    </div>
</section>

</div>
<!-- Right Column: Details & Action -->
<div class="lg:col-span-5">
    <div
        class="sticky top-24 flex flex-col gap-6 rounded-xl border border-slate-200 bg-white p-6 shadow-xl shadow-slate-200/50 dark:border-slate-700 dark:bg-slate-900 dark:shadow-none"
    >
        <!-- Summary Header -->
        <div
            class="border-b border-dashed border-slate-200 pb-5 dark:border-slate-700"
        >
            <div class="mb-2 flex items-start justify-between">
                <div>
                    <p
                        class="text-xs font-bold uppercase tracking-wider text-slate-400 white:text-slate-500"
                    >
                        Total Pembayaran
                    </p>
                    <p
                        class="mt-1 text-3xl font-black tracking-tight text-slate-900 dark:text-white"
                    >
                        Rp 2.500.000
                    </p>
                </div>

                <div
                    class="flex h-10 w-10 items-center justify-center rounded-full bg-primary/10 text-primary"
                >
                    <span class="material-symbols-outlined">
                        receipt_long
                    </span>
                </div>
            </div>

    <div class="mt-2 flex items-center gap-2">
        <span
            class="flex h-2 w-2 animate-pulse rounded-full bg-yellow-500"
            id="status-icon"
        ></span>
        <span
            class="text-sm font-medium text-yellow-600 dark:text-yellow-500"
            id="status-text"
        >
            Menunggu pembayaran
        </span>
    </div>
        </div>

<!-- Account Info -->
<div>
    <div class="space-y-2 text-sm text-white">
    <div class="flex justify-between">
        <strong>Nama murid</strong>
        <strong>Arjuna</strong>
    </div>
    <div class="flex justify-between">
        <strong>Priode pendaftaran</strong>
        <strong>2024 / 2025</strong>
    </div>
</div>

<div class="mt-4 space-y-2 text-sm text-white">
    <div class="flex justify-between">
        <span>Pendaftaran</span>
        <span>Rp 3.500.000</span>
    </div>
    <div class="flex justify-between">
        <span>Seragam</span>
        <span>Rp 1.000.000</span>
    </div>
    <div class="flex justify-between">
        <span>Buku Paket</span>
        <span>Rp 500.000</span>
    </div>
</div>


<div id="account-info-section">
    <p
        class="mb-2 mt-4 text-sm font-semibold text-slate-700 dark:text-slate-300"
        id="account-label"
    >
        Nomor Rekening BCA
    </p>

    <div
        class="group flex items-center justify-between rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 transition-colors hover:border-primary/50 dark:border-slate-600 dark:bg-slate-900"
        id="account-number-section"
    >
        <span
            class="font-mono text-xl font-bold tracking-wide text-slate-900 dark:text-white"
            id="account-number"
        >
            8800 1234 5678
        </span>

        <button
            type="button"
            title="Copy Number"
            class="flex h-9 w-9 items-center justify-center rounded-md text-slate-400 transition-all hover:bg-white hover:text-primary hover:shadow-sm active:scale-90 dark:hover:bg-slate-700"
            onclick="copyToClipboard(document.getElementById('account-number').innerText)"
        >
            <span class="material-symbols-outlined text-lg">
                content_copy
            </span>
        </button>
    </div>

    <div id="copy-notification" class="mt-2 text-xs text-green-600 opacity-0 transition-opacity duration-300">
        Nomor rekening berhasil disalin!
    </div>

    <p class="mt-2 text-right text-xs text-slate-400" id="timer">
        Berakhir pada 23:59:59
    </p>
</div>
</div>
<form
    action="{{ route('payment.store', $student->id) }}"
    method="POST"
    enctype="multipart/form-data"
>
    @csrf
<!-- Upload Area -->
<div class="space-y-3 pt-2">
    <div class="flex items-center justify-between">
        <label class="text-sm font-bold text-slate-900 dark:text-white">
            Bukti Pembayaran
        </label>
        <span
            class="rounded bg-red-100 px-2 py-0.5 text-[10px] font-semibold text-red-600 dark:bg-red-900/30 dark:text-red-400"
            id="required-label"
        >
            REQUIRED
        </span>
    </div>

    <div
        class="group relative flex w-full cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 px-6 py-8 transition-all hover:border-primary hover:bg-blue-50/50 dark:border-slate-600 dark:bg-slate-900/30 dark:hover:border-primary dark:hover:bg-primary/5"
        onclick="document.getElementById('dropzone-file').click();"
    >
        <div
            class="mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-white shadow-sm ring-1 ring-slate-100 transition-transform duration-300 group-hover:scale-110 dark:bg-slate-800 dark:ring-slate-700"
        >
            <span class="material-symbols-outlined text-2xl text-primary">
                cloud_upload
            </span>
        </div>

        <p class="mb-1 text-center text-sm font-bold text-slate-700 dark:text-slate-200">
            Uplaod bukti pembayaran
        </p>
        <p class="text-center text-xs text-slate-500 dark:text-slate-400">
            or drag and drop (JPG, PNG - Max 2MB)
        </p>

        <input
    id="dropzone-file"
    type="file"
    name="proof"
    accept="image/png,image/jpeg"
    class="hidden"
    required
/>
    </div>
</div>

<!-- Action Button -->
<div class="pt-2">
    <button
        class="flex w-full items-center justify-center gap-2 rounded-lg bg-primary px-6 py-4 text-base font-bold text-white shadow-lg shadow-blue-500/25 transition-all hover:-translate-y-0.5 hover:bg-blue-600 hover:shadow-blue-500/40 active:translate-y-0 active:shadow-sm disabled:cursor-not-allowed disabled:opacity-50 disabled:shadow-none"
    >
        <span>Konfirmasi Pembayaran</span>
        <span class="material-symbols-outlined text-xl">
            check_circle
        </span>
    </button>
        </form>

</div>
<!-- Security Note -->
<div class="flex items-center justify-center gap-2 text-xs text-slate-400 dark:text-slate-500">
    <span class="material-symbols-outlined text-sm">
        lock
    </span>
    <p>All data is encrypted and secure.</p>
</div>
</div>
</div>
</div>
</main>
</div>
    </form>
<script>
    const paymentMethods = {
        ewallet: {
            title: 'Petunjuk Pembayaran (E-Wallet)',
            instructions: `
                <ol class="list-inside list-decimal space-y-4 text-sm text-slate-600 dark:text-slate-300">
                    <li class="pl-2">
                        <span class="font-medium text-slate-900 dark:text-white">
                            Buka aplikasi E-Wallet:
                        </span>
                        Pilih aplikasi seperti OVO, GoPay, DANA, atau ShopeePay.
                    </li>
                    <li class="pl-2">
                        Pilih menu
                        <span class="font-semibold text-primary">
                            Transfer
                        </span>
                        atau
                        <span class="font-semibold text-primary">
                            Bayar
                        </span>.
                    </li>
                    <li class="pl-2">
                        Masukkan jumlah pembayaran sebesar
                        <strong>Rp 2.500.000</strong>.
                    </li>
                    <li class="pl-2">
                        Konfirmasi pembayaran dan
                        <span class="font-semibold text-primary">
                            Simpan bukti pembayaran
                        </span>.
                    </li>
                </ol>
            `,
            accountLabel: 'Nomor akun E-Wallet',
            accountNumber: '081269987654',
            showAccount: true
        },
        bri: {
            title: 'Petunjuk Pembayaran (BRI)',
            instructions: `
                <ol class="list-inside list-decimal space-y-4 text-sm text-slate-600 dark:text-slate-300">
                    <li class="pl-2">
                        <span class="font-medium text-slate-900 dark:text-white">
                            ATM / Mobile Banking:
                        </span>
                        Buka aplikasi BRImo.
                    </li>
                    <li class="pl-2">
                        Pilih menu
                        <span class="font-semibold text-primary">
                            Transfer
                        </span>
                        &gt;
                        <span class="font-semibold text-primary">
                            Virtual Account
                        </span>.
                    </li>
                    <li class="pl-2">
                        Masukkan nomor Virtual Account yang ditampilkan di panel kanan.
                    </li>
                    <li class="pl-2">
                        Masukkan jumlah pembayaran sebesar
                        <strong>Rp 2.500.000</strong>.
                    </li>
                    <li class="pl-2">
                        Konfirmasi dan masukkan PIN BRI Anda.
                        <span class="font-semibold text-primary">
                            Simpan bukti pembayaran
                        </span>.
                    </li>
                </ol>
            `,
            accountLabel: 'Nomor Rekening BRI',
            accountNumber: '1234 5678 9012',
            showAccount: true
        },
        bca: {
            title: 'Petunjuk Pembayaran (BCA)',
            instructions: `
                <ol class="list-inside list-decimal space-y-4 text-sm text-slate-600 dark:text-slate-300">
                    <li class="pl-2">
                        <span class="font-medium text-slate-900 dark:text-white">
                            ATM / Mobile Banking:
                        </span>
                        Buka aplikasi Mbanking m-BCA.
                    </li>
                    <li class="pl-2">
                        Pilih menu
                        <span class="font-semibold text-primary">
                            m-Transfer
                        </span>
                        &gt;
                        <span class="font-semibold text-primary">
                            BCA Virtual Account
                        </span>.
                    </li>
                    <li class="pl-2">
                        Masukkan nomor Virtual Account yang ditampilkan di panel kanan.
                    </li>
                    <li class="pl-2">
                        Masukkan jumlah pembayaran sebesar
                        <strong>Rp 2.500.000</strong>.
                    </li>
                    <li class="pl-2">
                        Konfirmasi transaksi dan masukkan PIN m-BCA Anda.
                        <span class="font-semibold text-primary">
                            Simpan bukti pembayaran
                        </span>.
                    </li>
                </ol>
            `,
            accountLabel: 'Nomor Rekening BCA',
            accountNumber: '8800 1234 5678',
            showAccount: true
        },
        mandiri: {
            title: 'Petunjuk Pembayaran (Mandiri)',
            instructions: `
                <ol class="list-inside list-decimal space-y-4 text-sm text-slate-600 dark:text-slate-300">
                    <li class="pl-2">
                        <span class="font-medium text-slate-900 dark:text-white">
                            ATM / Mobile Banking:
                        </span>
                        Buka aplikasi Mandiri Online.
                    </li>
                    <li class="pl-2">
                        Pilih menu
                        <span class="font-semibold text-primary">
                            Bayar
                        </span>
                        &gt;
                        <span class="font-semibold text-primary">
                            Virtual Account
                        </span>.
                    </li>
                    <li class="pl-2">
                        Masukkan nomor Virtual Account yang ditampilkan di panel kanan.
                    </li>
                    <li class="pl-2">
                        Masukkan jumlah pembayaran sebesar
                        <strong>Rp 2.500.000</strong>.
                    </li>
                    <li class="pl-2">
                        Konfirmasi dan masukkan PIN Mandiri Anda.
                        <span class="font-semibold text-primary">
                            Simpan bukti pembayaran
                        </span>.
                    </li>
                </ol>
            `,
            accountLabel: 'Nomor Rekening Mandiri',
            accountNumber: '9876 5432 1098',
            showAccount: true
        },
        bni: {
            title: 'Petunjuk Pembayaran (BNI)',
            instructions: `
                <ol class="list-inside list-decimal space-y-4 text-sm text-slate-600 dark:text-slate-300">
                    <li class="pl-2">
                        <span class="font-medium text-slate-900 dark:text-white">
                            ATM / Mobile Banking:
                        </span>
                        Buka aplikasi BNI Mobile Banking.
                    </li>
                    <li class="pl-2">
                        Pilih menu
                        <span class="font-semibold text-primary">
                            Transfer
                        </span>
                        &gt;
                        <span class="font-semibold text-primary">
                            Virtual Account
                        </span>.
                    </li>
                    <li class="pl-2">
                        Masukkan nomor Virtual Account yang ditampilkan di panel kanan.
                    </li>
                    <li class="pl-2">
                        Masukkan jumlah pembayaran sebesar
                        <strong>Rp 2.500.000</strong>.
                    </li>
                    <li class="pl-2">
                        Konfirmasi dan masukkan PIN BNI Anda.
                        <span class="font-semibold text-primary">
                            Simpan bukti pembayaran
                        </span>.
                    </li>
                </ol>
            `,
            accountLabel: 'Nomor Rekening BNI',
            accountNumber: '1111 2222 3333',
            showAccount: true
        },
        qris: {
            title: 'Petunjuk Pembayaran (QRIS)',
            instructions: `
                <ol class="list-inside list-decimal space-y-4 text-sm text-slate-600 dark:text-slate-300">
                    <li class="pl-2">
                        <span class="font-medium text-slate-900 dark:text-white">
                            Buka aplikasi E-Wallet:
                        </span>
                        Pilih aplikasi yang mendukung QRIS seperti OVO, GoPay, DANA, dll.
                    </li>
                    <li class="pl-2">
                        Pilih menu
                        <span class="font-semibold text-primary">
                            Scan QR
                        </span>.
                    </li>
                    <li class="pl-2">
                        Scan kode QR yang ditampilkan di bawah ini.
                        <div class="mt-4 flex justify-center">
                            <img src="/assets/images/qrcode.png" alt="QR Code Pembayaran" class="w-80 h-80 border border-slate-300 dark:border-slate-600 rounded-lg">
                        </div>
                    </li>
                    <li class="pl-2">
                        Konfirmasi jumlah pembayaran sebesar
                        <strong>Rp 2.500.000</strong>.
                    </li>
                    <li class="pl-2">
                        Selesaikan pembayaran dan
                        <span class="font-semibold text-primary">
                            Simpan bukti pembayaran
                        </span>.
                    </li>
                </ol>
            `,
            accountLabel: 'Tidak ada nomor rekening untuk QRIS',
            accountNumber: '',
            showAccount: false
        }
    };

    function selectMethod(method) {
        const data = paymentMethods[method];
        document.getElementById('instructions-title').innerText = data.title;
        document.getElementById('instructions-content').innerHTML = data.instructions;
        document.getElementById('account-label').innerText = data.accountLabel;
        document.getElementById('account-number').innerText = data.accountNumber;
        document.getElementById('account-info-section').style.display = data.showAccount ? 'block' : 'none';

        // Update active card
        const cards = document.querySelectorAll('.grid.grid-cols-2 > div');
        cards.forEach(card => {
            card.classList.remove('border-2', 'border-primary', 'bg-primary/5', 'ring-2', 'ring-primary/30', 'dark:bg-primary/10', 'bg-primary');
            card.querySelector('h3').classList.remove('text-primary', 'text-white');
            card.querySelector('p').classList.remove('text-primary/80', 'text-white/80');
            const check = card.querySelector('.absolute');
            if (check) check.remove();
        });

        // Find the selected card
        const selectedCard = document.querySelector(`[data-method="${method}"]`);
        if (selectedCard) {
            selectedCard.classList.add('border-2', 'border-primary', 'bg-primary', 'ring-2', 'ring-primary/30', 'dark:bg-primary/10');
            selectedCard.querySelector('h3').classList.add('text-white');
            selectedCard.querySelector('p').classList.add('text-white/80');
            const checkDiv = document.createElement('div');
            checkDiv.className = 'absolute -right-2 -top-2 flex h-6 w-6 items-center justify-center rounded-full bg-white text-primary shadow-sm ring-2 ring-white dark:ring-slate-900';
            checkDiv.innerHTML = '<span class="material-symbols-outlined text-sm font-bold">check</span>';
            selectedCard.appendChild(checkDiv);
        }
    }

    // Default to BCA
    selectMethod('bca');

    // Handle file upload
    document.getElementById('dropzone-file').addEventListener('change', function() {
        if (this.files.length > 0) {
            // Change status to "Pembayaran sedang di proses"
            document.getElementById('status-text').innerText = 'Segera upload bukti pembayaran';
            document.getElementById('status-text').classList.remove('text-yellow-600', 'dark:text-yellow-500');
            document.getElementById('status-text').classList.add('text-green-600', 'dark:text-green-500');
            document.getElementById('status-icon').classList.remove('bg-yellow-500', 'animate-pulse');
            document.getElementById('status-icon').classList.add('bg-blue-500');

            // Change REQUIRED label to blue
            const requiredLabel = document.getElementById('required-label');
            requiredLabel.classList.remove('bg-red-100', 'text-red-600', 'dark:bg-red-900/30', 'dark:text-red-400');
            requiredLabel.classList.add('bg-blue-100', 'text-blue-600', 'dark:bg-blue-900/30', 'dark:text-blue-400');

            // Indicate file uploaded
            const uploadText = document.querySelector('.group.relative .mb-1');
            uploadText.innerText = 'Bukti pembayaran sudah terupload';
            uploadText.classList.add('text-green-600');
        }
    });

    // Countdown Timer
    let timeLeft = 23 * 60 * 60 + 59 * 60 + 59; // 23:59:59 in seconds
    const timerElement = document.getElementById('timer');

    function updateTimer() {
        const hours = Math.floor(timeLeft / 3600);
        const minutes = Math.floor((timeLeft % 3600) / 60);
        const seconds = timeLeft % 60;
        timerElement.innerText = `Berakhir pada ${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        if (timeLeft > 0) {
            timeLeft--;
        } else {
            timerElement.innerText = 'Waktu habis';
            clearInterval(timerInterval);
        }
    }

    const timerInterval = setInterval(updateTimer, 1000);
    updateTimer(); // Initial call

    // Copy to Clipboard
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            const notification = document.getElementById('copy-notification');
            notification.classList.remove('opacity-0');
            notification.classList.add('opacity-100');
            setTimeout(() => {
                notification.classList.remove('opacity-100');
                notification.classList.add('opacity-0');
            }, 2000);
        }).catch(err => {
            console.error('Failed to copy: ', err);
        });
    }
</script>
</body>
@include('layout.footer')
</html>