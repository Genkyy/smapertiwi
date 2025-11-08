@include('layout.header')

<section class="fasilitas-container"> <div class="fasilitas-header"> <h1>Fasilitas <span>SMA Pertiwi Medan</span></h1> <p>Kami menyediakan berbagai fasilitas pendukung pembelajaran yang nyaman, lengkap, dan modern untuk mendukung kegiatan akademik maupun non-akademik siswa.</p> </div>
    <!-- FASILITAS AKADEMIK -->
    <div class="fasilitas-kategori" data-category="akademik">
        <h2><i class="fas fa-chalkboard"></i> Fasilitas Akademik</h2>
        <div class="fasilitas-img-box">
            <img src="assets/images/ujian.jpg" alt="Fasilitas Akademik" class="fasilitas-img" id="img-akademik">
        </div>
        <div class="fasilitas-grid">
            <div class="fasilitas-card" data-img="assets/images/ujian.jpg">Ruang Kelas</div>
            <div class="fasilitas-card" data-img="assets/images/perpus.jpeg">Perpustakaan</div>
            <div class="fasilitas-card" data-img="assets/images/labkom.jpg">Laboratorium Komputer/TIK</div>
            <div class="fasilitas-card" data-img="assets/images/labbahasa.jpg">Laboratorium Bahasa</div>
            <div class="fasilitas-card" data-img="assets/images/labkimia.jpg">Laboratorium Kimia & Biologi</div>
            <div class="fasilitas-card" data-img="assets/images/labfisika.jpg">Laboratorium Fisika</div>
            <div class="fasilitas-card" data-img="assets/images/labmusik.jpg">Laboratorium Musik</div>
        </div>
    </div>

    <!-- PENUNJANG KEGIATAN AKADEMIK -->
    <div class="fasilitas-kategori" data-category="penunjang">
        <h2><i class="fas fa-building-columns"></i> Penunjang Kegiatan Akademik</h2>
        <div class="fasilitas-img-box">
            <img src="assets/images/aula.jpg" alt="Penunjang Kegiatan" class="fasilitas-img" id="img-penunjang">
        </div>
        <div class="fasilitas-grid">
            <div class="fasilitas-card" data-img="assets/images/aula.jpg">Aula Sekolah</div>
            <div class="fasilitas-card" data-img="assets/images/osis.jpg">Ruang OSIS</div>
            <div class="fasilitas-card" data-img="assets/images/galeri.jpg">Ruang Galeri</div>
            <div class="fasilitas-card" data-img="assets/images/koperasi.jpg">Ruang Koperasi Sekolah</div>
        </div>
    </div>

    <!-- ADMINISTRASI -->
    <div class="fasilitas-kategori" data-category="admin">
        <h2><i class="fas fa-briefcase"></i> Ruang Administrasi & Tenaga Pendidik</h2>
        <div class="fasilitas-img-box">
            <img src="assets/images/kantorguru.jpg" alt="Administrasi Sekolah" class="fasilitas-img" id="img-admin">
        </div>
        <div class="fasilitas-grid">
            <div class="fasilitas-card" data-img="assets/images/kantorguru.jpg">Ruang Kepala Sekolah</div>
            <div class="fasilitas-card" data-img="assets/images/wakilkepsek.jpg">Ruang Wakil Kepala Sekolah</div>
            <div class="fasilitas-card" data-img="assets/images/tu.jpg">Ruang Tata Usaha</div>
            <div class="fasilitas-card" data-img="assets/images/guru.jpg">Ruang Guru</div>
            <div class="fasilitas-card" data-img="assets/images/bk.jpg">Ruang Bimbingan Konseling</div>
        </div>
    </div>

    <!-- FASILITAS UMUM -->
    <div class="fasilitas-kategori" data-category="umum">
        <h2><i class="fas fa-building"></i> Fasilitas Umum</h2>
        <div class="fasilitas-img-box">
            <img src="assets/images/musholla.jpg" alt="Fasilitas Umum" class="fasilitas-img" id="img-umum">
        </div>
        <div class="fasilitas-grid">
            <div class="fasilitas-card" data-img="assets/images/musholla.jpg">Musholla</div>
            <div class="fasilitas-card" data-img="assets/images/uks.jpg">UKS</div>
            <div class="fasilitas-card" data-img="assets/images/gudang.jpg">Gudang (Lantai 1 & 2)</div>
            <div class="fasilitas-card" data-img="assets/images/toiletkepsek.jpg">Toilet Kepala Sekolah</div>
            <div class="fasilitas-card" data-img="assets/images/toiletsiswa.jpg">Toilet Siswa & Guru (Lantai 1–2)</div>
        </div>
    </div>
</section>

<script>
    document.querySelectorAll('.fasilitas-kategori').forEach(kategori => {
        const imgTag = kategori.querySelector('.fasilitas-img');
        kategori.querySelectorAll('.fasilitas-card').forEach(card => {
            card.addEventListener('click', () => {
                const newImg = card.getAttribute('data-img');
                if (newImg) {
                    imgTag.classList.add('fade-out');

                    // Scroll otomatis ke gambar
                    imgTag.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });

                    setTimeout(() => {
                        imgTag.src = newImg;
                        imgTag.classList.remove('fade-out');
                    }, 300);
                }
            });
        });
    });
</script>

@include('layout.footer')
