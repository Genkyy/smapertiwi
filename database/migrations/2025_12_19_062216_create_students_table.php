<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
    $table->id();

    // ================= DATA SISWA =================
    $table->string('nama_lengkap');
    $table->string('nisn')->unique();
    $table->string('nik')->unique();
    $table->string('tempat_lahir');
    $table->date('tanggal_lahir');
    $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
    $table->string('agama');
    $table->string('jurusan');
    $table->string('no_hp');
    $table->string('ekskul')->nullable();
    $table->string('info_dari')->nullable();

    // ================= ALAMAT =================
    $table->text('alamat');
    $table->string('kecamatan');
    $table->string('kabupaten');
    $table->string('provinsi');
    $table->string('kode_pos');

    // ================= ORANG TUA =================
    $table->string('no_kk');
    $table->string('nama_kk');

    // AYAH
    $table->string('nama_ayah');
    $table->string('nik_ayah');
    $table->string('tahun_lahir_ayah');
    $table->string('status_ayah');
    $table->string('pekerjaan_ayah');
    $table->string('penghasilan_ayah');
    $table->string('pendidikan_ayah');
    $table->string('hp_ayah');

    // IBU
    $table->string('nama_ibu');
    $table->string('nik_ibu');
    $table->string('tahun_lahir_ibu');
    $table->string('status_ibu');
    $table->string('pekerjaan_ibu');
    $table->string('penghasilan_ibu');
    $table->string('pendidikan_ibu');
    $table->string('hp_ibu');

    // WALI
    $table->string('nama_wali')->nullable();
    $table->string('nik_wali')->nullable();
    $table->string('tahun_lahir_wali')->nullable();
    $table->string('status_wali')->nullable();
    $table->string('pekerjaan_wali')->nullable();
    $table->string('penghasilan_wali')->nullable();
    $table->string('pendidikan_wali')->nullable();
    $table->string('hp_wali')->nullable();

    // ================= KARTU =================
    $table->string('no_kks')->nullable();
    $table->string('no_pkh')->nullable();
    $table->string('no_kip')->nullable();

    // ================= SEKOLAH ASAL =================
    $table->string('nama_sekolah');
    $table->string('jenjang_sekolah');
    $table ->string('kelas');
    $table->string('status_sekolah');
    $table->string('npsn');
    $table->text('alamat_sekolah');

    // ================= DOKUMEN =================
    $table->string('foto')->nullable();
    $table->string('kk')->nullable();
    $table->string('ijazah')->nullable();

    // ================= STATUS =================
    $table->enum('status', [
        'baru',
        'aktif',
        'lulus',
        'nonaktif',
    ])->default('baru')->after('status');

    $table->enum('kategori', [
        'A',
        'B',
    ])->default('A')->after('status');

    $table->timestamps(); 
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
