<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_lengkap' => $this->faker->name(),
            'nisn' => $this->faker->unique()->numerify('##########'),
            'nik' => $this->faker->unique()->numerify('################'),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->date(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
            'jurusan' => $this->faker->randomElement(['IPA', 'IPS', 'Bahasa']),
            'no_hp' => $this->faker->phoneNumber(),
            'ekskul' => $this->faker->randomElement(['Pramuka', 'PMR', 'Basket', 'Futsal']),
            'info_dari' => $this->faker->randomElement(['Internet', 'Teman', 'Sekolah', 'Keluarga']),
            'alamat' => $this->faker->address(),
            'kecamatan' => $this->faker->city(),
            'kabupaten' => $this->faker->city(),
            'provinsi' => $this->faker->state(),
            'kode_pos' => $this->faker->postcode(),
            'no_kk' => $this->faker->numerify('################'),
            'nama_kk' => $this->faker->name(),
            'nama_ayah' => $this->faker->name('male'),
            'nik_ayah' => $this->faker->numerify('################'),
            'tahun_lahir_ayah' => $this->faker->year(),
            'status_ayah' => $this->faker->randomElement(['Kawin', 'Cerai']),
            'pekerjaan_ayah' => $this->faker->jobTitle(),
            'penghasilan_ayah' => $this->faker->numberBetween(1000000, 10000000),
            'pendidikan_ayah' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'S1']),
            'hp_ayah' => $this->faker->phoneNumber(),
            'nama_ibu' => $this->faker->name('female'),
            'nik_ibu' => $this->faker->numerify('################'),
            'tahun_lahir_ibu' => $this->faker->year(),
            'status_ibu' => $this->faker->randomElement(['Kawin', 'Cerai']),
            'pekerjaan_ibu' => $this->faker->jobTitle(),
            'penghasilan_ibu' => $this->faker->numberBetween(1000000, 10000000),
            'pendidikan_ibu' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'S1']),
            'hp_ibu' => $this->faker->phoneNumber(),
            'nama_wali' => $this->faker->name(),
            'nik_wali' => $this->faker->numerify('################'),
            'tahun_lahir_wali' => $this->faker->year(),
            'status_wali' => $this->faker->randomElement(['Kawin', 'Cerai']),
            'pekerjaan_wali' => $this->faker->jobTitle(),
            'penghasilan_wali' => $this->faker->numberBetween(1000000, 10000000),
            'pendidikan_wali' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'S1']),
            'hp_wali' => $this->faker->phoneNumber(),
            'no_kks' => $this->faker->numerify('################'),
            'no_pkh' => $this->faker->numerify('################'),
            'no_kip' => $this->faker->numerify('################'),
            'nama_sekolah' => $this->faker->company() . ' School',
            'jenjang_sekolah' => $this->faker->randomElement(['SMP', 'SMA']),
            'status_sekolah' => $this->faker->randomElement(['Negeri', 'Swasta']),
            'npsn' => $this->faker->numerify('########'),
            'alamat_sekolah' => $this->faker->address(),
            'foto' => null,
            'kk' => null,
            'ijazah' => null,
            'status' => $this->faker->randomElement(['pending', 'verifikasi', 'diterima', 'ditolak']),
        ];
    }
}
