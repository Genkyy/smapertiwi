@include('layout.header')
 <div class="spmb-hasil-container">
      <h1 class="spmb-hasil-title">PENGUMUMAN HASIL SELEKSI</h1>
      <p class="spmb-hasil-subtitle">
        SISTEM PENERIMAAN MURID BARU (SPMB) <br />
        Tahun Pelajaran 2025 / 2026
      </p>

      <!-- Search + Button -->
      <div class="spmb-hasil-topbar">
        <input
          type="text"
          id="searchName"
          class="spmb-hasil-search"
          placeholder="Cari nama siswa..."
          onkeyup="searchStudent()"
        />

        <a href="pendaftaran.html" class="spmb-hasil-btn-daftar">
          Daftar SPMB Online
        </a>
      </div>

      <!-- Table -->
      <div class="spmb-hasil-table-wrapper">
        <table class="spmb-hasil-table">
          <thead>
            <tr>
              <th>NISN</th>
              <th>Nama Siswa</th>
              <th>Jenis Daftar</th>
              <th>Jalur</th>
              <th>Sekolah Asal</th>
              <th>Status</th>
              <th>Detail</th>
            </tr>
          </thead>

          <tbody id="resultTable">
            <tr>
              <td>1234567890</td>
              <td>Aulia Rahmanda</td>
              <td>Baru</td>
              <td>Zonasi</td>
              <td>SMPN 1 Medan</td>
              <td><span class="spmb-status lulus">DITERIMA</span></td>
              <td><a href="#" class="spmb-detail-btn">Lihat</a></td>
            </tr>

            <tr>
              <td>9988776655</td>
              <td>Rafi Pratama</td>
              <td>Pindahan</td>
              <td>Prestasi</td>
              <td>SMPN 4 Medan</td>
              <td><span class="spmb-status gagal">TIDAK LULUS</span></td>
              <td><a href="#" class="spmb-detail-btn">Lihat</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- footer.html -->
    <footer class="site-footer">
      <div class="footer-inner">
        <!-- Logo Sekolah -->
        <div class="footer-col logo">
          <img
            src="assets/images/logopanjang.png"
            alt="Logo SMA Pertiwi Medan"
            class="school-logo"
          />
        </div>

        <div class="footer-col contact">
          <h3>Hubungi Kami</h3>
          <p>
            <img src="assets/images/gmail.png" alt="email" />
            smaspertiwimedan@gmail.com
          </p>
          <p>
            <img src="assets/images/whatsapp.png" alt="whatsapp" />
            0813-6229-1258
          </p>
          <p>
            <img src="assets/images/map.png" alt="lokasi" />
            Jl. Budi Persatuan No.1, Medan Barat
          </p>
        </div>

        <div class="footer-col follow">
          <h3>Ikuti Kami</h3>
          <div class="footer-social">
            <a
              href="https://web.facebook.com/SMAPertiwiMedan.co.sch"
              target="_blank"
            >
              <img src="assets/images/facebook.png" alt="facebook" />
            </a>
            <a href="https://www.instagram.com/smapertiwimedan" target="_blank">
              <img src="assets/images/instagram.png" alt="instagram" />
            </a>
            <a
              href="https://www.youtube.com/@smapertiwimedan8116"
              target="_blank"
            >
              <img src="assets/images/youtube.png" alt="youtube" />
            </a>
          </div>
          <p class="motto">"Belajar. Berkarya. Berprestasi."</p>
        </div>
      </div>

      <div class="footer-bottom">
        <p>© 2025 SMA Pertiwi Medan.</p>
      </div>
    </footer>
    <script>
      // live search
      function searchStudent() {
        const input = document.getElementById("searchName").value.toLowerCase();
        const rows = document.querySelectorAll("#resultTable tr");

        rows.forEach((row) => {
          const name = row.children[1].textContent.toLowerCase();
          row.style.display = name.includes(input) ? "" : "none";
        });
      }
      // --- NAVBAR MOBILE TOGGLE ---
      const menuToggle = document.getElementById("menuToggle");
      const mobileMenu = document.getElementById("mobileMenu");
      const body = document.body;

      menuToggle.addEventListener("click", function () {
        mobileMenu.classList.toggle("active");
        body.classList.toggle("no-scroll"); // supaya tidak bisa scroll saat menu terbuka
      });

      // Tutup menu jika klik di luar area menu
      document.addEventListener("click", function (e) {
        if (!mobileMenu.contains(e.target) && !menuToggle.contains(e.target)) {
          mobileMenu.classList.remove("active");
          body.classList.remove("no-scroll");
        }
      });
    </script>
@include('layout.footer')
