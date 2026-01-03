@include('layout.header')
 <section class="spmb-hero">
      <div class="overlay"></div>
      <div class="content">
        <h1>SELAMAT DATANG DI SPMB ONLINE <span>SMA PERTIWI MEDAN</span></h1>
        <p>Media Pendaftaran Siswa Baru Tahun Ajaran 2025/2026</p>
        <a href="{{ url('/formpendaftaran') }}" class="btn-primary">Daftar Sekarang</a>
      </div>
    </section>

    <!-- ALUR PENDAFTARAN -->
    <section class="alur">
      <div class="container">
        <h2>Alur Pendaftaran</h2>
        <div class="timeline">
          <div class="timeline-step">
            <div class="icon"><i class="fa-solid fa-laptop"></i></div>
            <div class="content">
              <h3>1. Daftar Online</h3>
              <p>
                Mengisi formulir pendaftaran secara online melalui website resmi
                sekolah.
              </p>
            </div>
          </div>

          <div class="timeline-line"></div>

          <div class="timeline-step">
            <div class="icon">
              <i class="fa-solid fa-file-circle-check"></i>
            </div>
            <div class="content">
              <h3>2. Verifikasi Berkas</h3>
              <p>
                Pihak panitia akan memverifikasi data dan dokumen yang
                dikirimkan.
              </p>
            </div>
          </div>

          <div class="timeline-line"></div>

          <div class="timeline-step">
            <div class="icon"><i class="fa-solid fa-user-graduate"></i></div>
            <div class="content">
              <h3>3. Tes & Wawancara</h3>
              <p>
                Calon siswa akan mengikuti tes dan wawancara sesuai jadwal yang
                ditentukan.
              </p>
            </div>
          </div>

          <div class="timeline-line"></div>

          <div class="timeline-step">
            <div class="icon"><i class="fa-solid fa-bullhorn"></i></div>
            <div class="content">
              <h3>4. Pengumuman</h3>
              <p>
                Hasil seleksi akan diumumkan melalui website dan dapat diunduh
                langsung.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SYARAT PENDAFTARAN -->
    <section class="syarat">
      <div class="container">
        <h2>Syarat Pendaftaran</h2>
        <div class="syarat-grid">
          <div class="syarat-card">
            <i class="fa-solid fa-id-card"></i>
            <h4>Identitas Diri</h4>
            <p>
              Fotokopi Akta Kelahiran dan Kartu Keluarga masing-masing 1 lembar.
            </p>
          </div>
          <div class="syarat-card">
            <i class="fa-solid fa-file-lines"></i>
            <h4>Dokumen Sekolah</h4>
            <p>
              Fotokopi Ijazah atau Surat Keterangan Lulus (SKL) dari sekolah
              asal.
            </p>
          </div>
          <div class="syarat-card">
            <i class="fa-solid fa-image"></i>
            <h4>Pas Foto</h4>
            <p>Pas foto ukuran 3x4 berwarna latar biru sebanyak 2 lembar.</p>
          </div>
          <div class="syarat-card">
            <i class="fa-solid fa-pen-to-square"></i>
            <h4>Formulir Online</h4>
            <p>
              Mengisi formulir pendaftaran secara lengkap dan sesuai data
              sebenarnya.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="informasi">
      <div class="container">
        <h2>Informasi Pendaftaran</h2>
        <div class="info-wrapper">
          <!-- Teks Informasi -->
          <div class="info-text">
            <p>
              SPMB Online SMA Pertiwi Medan dirancang untuk memberikan kemudahan
              bagi calon peserta didik dalam melakukan pendaftaran tanpa harus
              datang ke sekolah. Setiap calon siswa diminta untuk mengisi data
              secara <strong>lengkap, jujur, dan benar</strong> agar proses
              seleksi berjalan lancar.
            </p>
            <p>
              Pastikan dokumen yang diunggah memiliki kualitas gambar yang
              jelas, sesuai format yang ditentukan, dan periksa kembali data
              sebelum dikirim. Panitia akan menghubungi peserta melalui kontak
              yang tertera apabila terdapat kekurangan berkas.
            </p>

            <!-- Card Informasi Jadwal -->
            <div class="info-cards">
              <div class="info-card">
                <i class="fa-regular fa-calendar-days"></i>
                <div>
                  <h4>Jadwal Pendaftaran</h4>
                  <ul>
                    <li>
                      Pendaftaran: <strong>1 Maret – 30 Juni 2025</strong>
                    </li>
                    <li>Tes & Wawancara: <strong>10 – 15 Juli 2025</strong></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Gambar -->
          <div class="info-image">
            <img
              src="assets/images/alur.jpeg"
              alt="Ilustrasi Pendaftaran Online"
            />
          </div>
        </div>
      </div>
    </section>

<script>
  // Timer ke Januari 2026
  const countdown = () => {
    const targetDate = new Date("Jan 1, 2026 00:00:00").getTime();
    const now = new Date().getTime();
    const gap = targetDate - now;

    const second = 1000;
    const minute = second * 60;
    const hour = minute * 60;
    const day = hour * 24;

    const textDay = Math.floor(gap / day);
    const textHour = Math.floor((gap % day) / hour);
    const textMinute = Math.floor((gap % hour) / minute);
    const textSecond = Math.floor((gap % minute) / second);

    document.getElementById("days").innerText = textDay;
    document.getElementById("hours").innerText = textHour;
    document.getElementById("minutes").innerText = textMinute;
    document.getElementById("seconds").innerText = textSecond;
  };

  setInterval(countdown, 1000);
</script>

@include('layout.footer')
