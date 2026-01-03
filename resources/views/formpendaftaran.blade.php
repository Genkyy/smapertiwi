@include('layout.header')

<section class="spmb-form-container">
      <h1 class="spmb-title">
        Formulir Pendaftaran SPMB Online <br />
        SMA PERTIWI MEDAN
      </h1>

      <!-- PROGRESS BAR -->
      <div class="spmb-progressbar">
        <div class="spmb-progress-track">
          <div class="spmb-progress-fill" id="progress"></div>
        </div>

        <ul class="spmb-progress-steps">
          <li class="spmb-step active">
            <div class="spmb-step-icon">
              <i class="fa-solid fa-file-contract"></i>
            </div>
            <div class="spmb-step-label">Ketentuan</div>
          </li>

          <li class="spmb-step">
            <div class="spmb-step-icon">
              <i class="fa-solid fa-user-graduate"></i>
            </div>
            <div class="spmb-step-label">Data Siswa</div>
          </li>

          <li class="spmb-step">
            <div class="spmb-step-icon">
              <i class="fa-solid fa-map-location-dot"></i>
            </div>
            <div class="spmb-step-label">Alamat</div>
          </li>

          <li class="spmb-step">
            <div class="spmb-step-icon"><i class="fa-solid fa-users"></i></div>
            <div class="spmb-step-label">Orang Tua</div>
          </li>

          <li class="spmb-step">
            <div class="spmb-step-icon"><i class="fa-solid fa-school"></i></div>
            <div class="spmb-step-label">Sekolah</div>
          </li>

          <li class="spmb-step">
            <div class="spmb-step-icon">
              <i class="fa-solid fa-circle-check"></i>
            </div>
            <div class="spmb-step-label">Konfirmasi</div>
          </li>
        </ul>
      </div>
@if ($errors->any())
  <div style="background:#fee;color:#900;padding:10px;margin-bottom:15px;">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form
  id="registrationForm"
  method="POST"
  action="{{ route('pendaftaran.store') }}"
  enctype="multipart/form-data"
>
  @csrf
        <!-- STEP 1 -->
        <div class="spmb-step-page active">
          <div class="spmb-card">
            <h2 class="spmb-section-title">Ketentuan Pendaftaran</h2>
            <img src="assets/images/alur.jpeg" class="spmb-img" />

            <p class="spmb-info-text">
              SPMB Online SMA Pertiwi Medan digunakan untuk mempermudah calon
              siswa melakukan pendaftaran tanpa harus datang ke sekolah. Mohon
              mengisi data dengan benar, akurat dan sesuai dokumen resmi.
            </p>

            <label class="spmb-agree">
              <input type="radio" name="setuju_ketentuan" required />
              <span>Saya menyetujui seluruh ketentuan pendaftaran</span>
            </label>
          </div>
        </div>

        <!-- STEP 2: DATA SISWA (DESAIN BARU) -->
        <div class="spmb-step-page">
          <div class="spmb-card">
            <h2 class="spmb-section-title">Data Siswa</h2>

            <!-- 1 Kolom -->
            <div class="spmb-form-group">
              <label>Nama Lengkap</label>
              <input name="nama_lengkap" type="text" class="spmb-input" required>
            </div>

            <div class="spmb-form-group">
              <label>NISN</label>
              <input name="nisn" type="text" class="spmb-input">
            </div>

            <div class="spmb-form-group">
              <label>NIK</label>
              <input name="nik" type="text" class="spmb-input" placeholder="Masukkan NIK siswa">
            </div>

            <div class="spmb-grid-2">
              <div class="spmb-form-group">
                <label>Tempat Lahir</label>
                <input name="tempat_lahir" type="text" class="spmb-input">
              </div>

              <div class="spmb-form-group">
                <label>Tanggal Lahir</label>
                <input name="tanggal_lahir" type="date" class="spmb-input">
              </div>
            </div>
            <div class="spmb-form-group">
              <label>Jenis Kelamin</label>
              <select name="jenis_kelamin" class="spmb-input" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="spmb-form-group">
            <label>Agama</label>
            <select name="agama" class="spmb-input" required>
              <option value="">Pilih Agama</option>
              <option value="Islam">Islam</option>
              <option value="Kristen">Kristen</option>
              <option value="Katolik">Katolik</option>
              <option value="Hindu">Hindu</option>
              <option value="Budha">Budha</option>
            </select>
          </div>

          <!-- JURUSAN -->
          <div class="spmb-form-group">
            <label>Jurusan</label>
            <select name="jurusan" class="spmb-input" required>
              <option value="">Pilih Jurusan</option>
              <option value="IPA">IPA</option>
              <option value="IPS">IPS</option>
            </select>
          </div>
            <div class="spmb-form-group">
              <label>Nomor HP</label>
              <input name="no_hp" type="number" class="spmb-input">
            </div>

            <div class="spmb-form-group">
              <label>Ekstrakurikuler</label>
              <select name="ekskul" class="spmb-input">
                <option value="">Pilih Ekstrakurikuler</option>
                <option value="Futsal">Futsal</option>
                <option value="Basket">Basket</option>
                <option value="Musik">Musik</option>
                <option value="Pramuka">Pramuka</option>
                <option value="Tari">Tari</option>
                <option value="Tahfidz">Tahfidz</option>
                <option value="Multimedia">Multimedia</option>
                <option value="E-Sport">E-Sport</option>
              </select>
            </div>

            <div class="spmb-form-group">
              <label>Mendapat Informasi Sekolah dari</label>
              <input name="info_dari" type="text" class="spmb-input">
            </div>


            <hr class="spmb-divider" />

            <h3 class="spmb-subtitle">Upload Dokumen Persyaratan</h3>
            <br />

            <!-- Pas Foto -->
            <div class="spmb-form-group">
              <label>Upload Pas Foto</label>
              <input name="foto" type="file" class="spmb-input" accept=".jpg,.jpeg,.png">
            </div>

            <div class="spmb-form-group">
              <label>Upload Kartu Keluarga</label>
              <input name="kk" type="file" class="spmb-input" accept=".jpg,.jpeg,.png,.pdf">
            </div>

            <div class="spmb-form-group">
              <label>Upload Ijazah / SKL</label>
              <input name="ijazah" type="file" class="spmb-input" accept=".jpg,.jpeg,.png,.pdf">
            </div>

          </div>
        </div>
        <!-- STEP 3: ALAMAT -->
        <div class="spmb-step-page">
          <div class="spmb-card">
            <h2 class="spmb-section-title">Alamat Calon Siswa</h2>

            <div class="spmb-form-group">
              <label>Alamat Lengkap</label>
              <input name="alamat" type="text" class="spmb-input">
            </div>

            <div class="spmb-grid-2">
              <div class="spmb-form-group">
                <label>Kecamatan</label>
                <input name="kecamatan" type="text" class="spmb-input">
              </div>

              <div class="spmb-form-group">
                <label>Kabupaten/Kota</label>
                <input name="kabupaten" type="text" class="spmb-input">
              </div>
            </div>

            <div class="spmb-grid-2">
              <div class="spmb-form-group">
                <label>Provinsi</label>
                <input name="provinsi" type="text" class="spmb-input">
              </div>

              <div class="spmb-form-group">
                <label>Kode Pos</label>
                <input name="kode_pos" type="number" class="spmb-input" placeholder="Kode pos">
              </div>
            </div>
          </div>
        </div>
        <!-- STEP 4: IDENTITAS ORANG TUA / WALI -->
        <div class="spmb-step-page">
          <div class="spmb-card">
            <h2 class="spmb-section-title">Identitas Orang Tua & Wali</h2>

            <!-- =============================== -->
            <!-- DATA AYAH -->
            <!-- =============================== -->
            <h3 class="spmb-subtitle">Data Ayah Kandung</h3>

            <div class="spmb-grid-2">
              <div class="spmb-form-group">
                <label>Nomor Kartu Keluarga</label>
                <input name="no_kk" type="text" class="spmb-input" placeholder="Nomor KK" />
              </div>
              <div class="spmb-form-group">
                <label>Nama Kepala Keluarga</label>
                <input name="nama_kk" type="text" class="spmb-input" placeholder="Nama KK" />
              </div>
            </div>

            <div class="spmb-grid-2">
              <div class="spmb-form-group">
                <label>Nama Ayah</label>
                <input name="nama_ayah" type="text" class="spmb-input" placeholder="Nama ayah" />
              </div>
              <div class="spmb-form-group">
                <label>NIK Ayah</label>
                <input name="nik_ayah" type="text" class="spmb-input" placeholder="NIK ayah" />
              </div>
            </div>

            <div class="spmb-grid-2">
              <div class="spmb-form-group">
                <label>Tahun Lahir Ayah</label>
                <input name="tahun_lahir_ayah" type="number" class="spmb-input" placeholder="2000" required />
              </div>
              <div class="spmb-form-group">
                <label>Status Ayah</label>
                <select class="spmb-input" name="status_ayah">
                  <option>Pilih status</option>
                  <option value="Masih Hidup">Masih Hidup</option>
                  <option value="Sudah Meninggal">Sudah Meninggal</option>
                </select>
              </div>
            </div>

            <div class="spmb-grid-2">
              <div class="spmb-form-group">
                <label>Pekerjaan Ayah</label>
                <input name="pekerjaan_ayah"
                  type="text"
                  class="spmb-input"
                  placeholder="Pekerjaan ayah"
                />
              </div>
              <div class="spmb-form-group">
                <label>Penghasilan Ayah</label>
                <input name="penghasilan_ayah"
                  type="text"
                  class="spmb-input"
                  placeholder="Contoh: 2.000.000"
                />
              </div>
            </div>

            <div class="spmb-form-group">
              <label>Pendidikan Terakhir Ayah</label>
              <input name="pendidikan_ayah"
                type="text"
                class="spmb-input"
                placeholder="Pendidikan ayah"
              />
            </div>
            <div class="spmb-form-group">
              <label>Nomor HP</label>
              <input name="hp_ayah" type="number" class="spmb-input" placeholder="08xxxx" />
            </div>

            <hr class="spmb-divider" />

            <!-- =============================== -->
            <!-- DATA IBU -->
            <!-- =============================== -->
            <h3 class="spmb-subtitle">Data Ibu Kandung</h3>

            <div class="spmb-grid-2">
              <div class="spmb-form-group">
                <label>Nama Ibu</label>
                <input name="nama_ibu" type="text" class="spmb-input" placeholder="Nama ibu" />
              </div>
              <div class="spmb-form-group">
                <label>NIK Ibu</label>
                <input name="nik_ibu" type="text" class="spmb-input" placeholder="NIK ibu" />
              </div>
            </div>

            <div class="spmb-grid-2">
              <div class="spmb-form-group">
                <label>Tahun Lahir Ibu</label>
                <input name="tahun_lahir_ibu" type="number" class="spmb-input" placeholder="2000" />
              </div>
              <div class="spmb-form-group">
                <label>Status Ibu</label>
                <select name="status_ibu" class="spmb-input">
                  <option value="">Pilih status</option>
                  <option value="Masih Hidup">Masih Hidup</option>
                  <option value="Sudah Meninggal">Sudah Meninggal</option>
                </select>
              </div>
            </div>

            <div class="spmb-grid-2">
              <div class="spmb-form-group">
                <label>Pekerjaan Ibu</label>
                <input name="pekerjaan_ibu"
                  type="text"
                  class="spmb-input"
                  placeholder="Pekerjaan ibu"
                />
              </div>
              <div class="spmb-form-group">
                <label>Penghasilan Ibu</label>
                <input name="penghasilan_ibu"
                  type="text"
                  class="spmb-input"
                  placeholder="Contoh: 2.000.000"
                />
              </div>
            </div>

            <div class="spmb-form-group">
              <label>Pendidikan Terakhir Ibu</label>
              <input name="pendidikan_ibu"
                type="text"
                class="spmb-input"
                placeholder="Pendidikan ibu"
              />
            </div>
            <div class="spmb-form-group">
              <label>Nomor HP</label>
              <input name="hp_ibu" type="number" class="spmb-input" placeholder="08xxxx" />
            </div>

            <hr class="spmb-divider" />

            <!-- =============================== -->
            <!-- DATA WALI -->
            <!-- =============================== -->
            <h3 class="spmb-subtitle">Data Wali</h3>

            <div class="spmb-grid-2">
              <div class="spmb-form-group">
                <label>Nama Wali</label>
                <input name="nama_wali" type="text" class="spmb-input" placeholder="Nama wali" />
              </div>
              <div class="spmb-form-group">
                <label>NIK Wali</label>
                <input name="nik_wali" type="text" class="spmb-input" placeholder="NIK wali" />
              </div>
            </div>

            <div class="spmb-grid-2">
              <div class="spmb-form-group">
                <label>Tahun Lahir Wali</label>
                <input name="tahun_lahir_wali" type="number" class="spmb-input" placeholder="2000" />
              </div>
              <div class="spmb-form-group">
                <label>Status Wali</label>
                <select name="status_wali" class="spmb-input">
                  <option value="">Pilih status</option>
                  <option value="Masih Hidup">Masih Hidup</option>
                  <option value="Sudah Meninggal">Sudah Meninggal</option>
                </select>
              </div>
            </div>

            <div class="spmb-grid-2">
              <div class="spmb-form-group">
                <label>Pekerjaan Wali</label>
                <input name="pekerjaan_wali"
                  type="text"
                  class="spmb-input"
                  placeholder="Pekerjaan wali"
                />
              </div>
              <div class="spmb-form-group">
                <label>Penghasilan Wali</label>
                <input name="penghasilan_wali"
                  type="text"
                  class="spmb-input"
                  placeholder="Contoh: 2.000.000"
                />
              </div>
            </div>

            <div class="spmb-form-group">
              <label>Pendidikan Terakhir Wali</label>
              <input name="pendidikan_wali"
                type="text"
                class="spmb-input"
                placeholder="Pendidikan wali"
              />
            </div>
            <div class="spmb-form-group">
              <label>Nomor HP</label>
              <input name="hp_wali" type="number" class="spmb-input" placeholder="08xxxx" />
            </div>

            <hr class="spmb-divider" />

            <!-- =============================== -->
            <!-- STATUS KARTU -->
            <!-- =============================== -->
            <h3 class="spmb-subtitle">Status Kepemilikan Kartu</h3>

            <div class="spmb-form-group">
              <label>No KKS</label>
              <input name="no_kks" type="text" class="spmb-input" placeholder="Nomor KKS" />
            </div>

            <div class="spmb-form-group">
              <label>No PKH</label>
              <input name="no_pkh" type="text" class="spmb-input" placeholder="Nomor PKH" />
            </div>

            <div class="spmb-form-group">
              <label>No KIP</label>
              <input name="no_kip" type="text" class="spmb-input" placeholder="Nomor KIP" />
            </div>
          </div>
        </div>
        <!-- STEP 5: DATA SEKOLAH ASAL -->
        <div class="spmb-step-page">
          <div class="spmb-card">
            <h2 class="spmb-section-title">Data Sekolah Asal</h2>

            <div class="spmb-form-group">
              <label>Nama Sekolah</label>
              <input name="nama_sekolah"
                type="text"
                class="spmb-input"
                placeholder="Nama sekolah asal"
              />
            </div>

            <div class="spmb-grid-2">
              <div class="spmb-form-group">
                <label>Jenjang Sekolah</label>
                <select name="jenjang_sekolah" class="spmb-input">
                  <option value="SMP">SMP</option>
                  <option value="MTS">MTS</option>
                </select>
              </div>
        <div class="spmb-form-group">
          <label>Kelas</label>
          <select name="kelas" class="spmb-input">
            <option value="">Pilih</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
          </select>
        </div>
              <div class="spmb-form-group">
                <label>Status Sekolah</label>
                <select name="status_sekolah" class="spmb-input">
                <option value="Negeri">Negeri</option>
                <option value="Swasta">Swasta</option>
              </select>
              </div>
            </div>

            <div class="spmb-form-group">
              <label>NPSN Sekolah</label>
              <input name="npsn" type="text" class="spmb-input" placeholder="Nomor NPSN" />
            </div>

            <div class="spmb-form-group">
              <label>Lokasi Sekolah</label>
              <input
                name="alamat_sekolah"
                class="spmb-input"
                placeholder="Alamat lengkap sekolah"
              />
            </div>
          </div>
        </div>
        <!-- STEP 6: KONFIRMASI -->
        <div class="spmb-step-page">
          <div class="spmb-card">
            <h2 class="spmb-section-title">Konfirmasi Data</h2>
            <p>
              Proses pendaftaran PPDB Online SMA Pertiwi Medan hampir selesai.
              Silakan periksa kembali seluruh data yang telah Anda masukkan
              sebelum mengirim formulir.
            </p>
            <label class="spmb-agree">
              <input type="radio" name="setuju_konfirmasi" required />

              <span
                >Pastikan semua informasi benar dan sesuai dokumen resmi.</span
              >
            </label>
          </div>
        </div>

        <!-- BUTTONS -->
        <div class="spmb-btns">
        <button type="button" class="spmb-btn prev">Kembali</button>
        <button type="button" class="spmb-btn next">Lanjut</button>

        <button
          type="submit"
          class="spmb-btn kirim"
          style="display: none;"
        >
          Kirim Formulir
        </button>
      </div>


        </div>
        </div>
      </form>
      <script>
        const nextBtns = document.querySelectorAll(".next");
      const prevBtns = document.querySelectorAll(".prev");
      const formSteps = document.querySelectorAll(".spmb-step-page");
      const steps = document.querySelectorAll(".spmb-step");
      const progressFill = document.getElementById("progress");
      const kirimBtn = document.querySelector(".kirim");
      let step = 0;

      // Next Button
      nextBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
          if (step < formSteps.length - 1) step++;
          updateStep();
          window.scrollTo({ top: 500, behavior: "smooth" }); // keep UX oke
        });
      });

      // Previous Button
      prevBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
          if (step > 0) step--;
          updateStep();
          window.scrollTo({ top: 500, behavior: "smooth" });
        });
      });

      function updateStep() {
        formSteps.forEach((f) => f.classList.remove("active"));
        formSteps[step].classList.add("active");

        steps.forEach((s, i) => {
          if (i <= step) s.classList.add("active");
          else s.classList.remove("active");
        });

        const progressPercent = (step / (formSteps.length - 1)) * 100;
        if (progressFill) progressFill.style.width = progressPercent + "%";

      // tombol kembali: hidden di step 0, visible di lainnya
      prevBtns.forEach((btn) => {
        btn.style.display = step === 0 ? "none" : "inline-block";
      });

      // tombol lanjut: visible di semua kecuali step terakhir
      nextBtns.forEach((btn) => {
        btn.style.display =
          step === formSteps.length - 1 ? "none" : "inline-block";
      });

      // tombol kirim: hanya visible di step terakhir
      kirimBtn.style.display =
        step === formSteps.length - 1 ? "inline-block" : "none";
            }

            /* POPUP BERHASIL */
  function showFormSuccess() {
    const popup = document.getElementById("formSuccessOverlay");
    popup.classList.add("show");

    setTimeout(() => {
      window.location.href = "{{ url('/pembayaran') }}";
    }, 5500);
  }
      // optional: fungsi submit (contoh)

      // init
      updateStep();

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

      // Jalankan saat awal
      updateStep();
    </script>
    </section>
<div id="formSuccessOverlay" class="form-success-overlay">
      <div class="form-success-box">
        <div class="form-checkmark">
          <div class="checkmark-circle">
            <i class="fas fa-check"></i>
          </div>
        </div>

        <h2 class="form-success-title">Formulir Berhasil Dikirim!</h2>

        <p class="form-success-text">
          Terima kasih telah mengisi formulir pendaftaran. Selanjutnya anda akan
          diarahkan ke halaman pembayaran
        </p>
      </div>
    </div>
    @include('layout.footer')
