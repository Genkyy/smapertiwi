@include('layout.header')

<?php
// Data guru (sementara statik, nanti bisa diganti database)
$gurus = [
    ["nama" => "Asmanto Purba, M.Pd", "mapel" => "Matematika", "foto" => "assets/images/pakasmanto.jpg"],
    ["nama" => "Azhar Safari Siregar, SE", "mapel" => "Agama", "foto" => "assets/images/pakazhar.jpg"],
    ["nama" => "Dedek Elen Enjelina, SPd", "mapel" => "Bahasa Indonesia & KTI", "foto" => "assets/images/budedek.jpg"],
    ["nama" => "Dicky Bayu Saputra, MPd", "mapel" => "Biologi", "foto" => "assets/images/pakbayu.jpg"],
    ["nama" => "Dwi Anggreani Hanifah, SPd", "mapel" => "Fisika", "foto" => "assets/images/budwi.jpg"],
    ["nama" => "Fina Afrilia Surbakti, SPd", "mapel" => "PPKN", "foto" => "assets/images/bufina.jpg"],
    ["nama" => "Indraina Anggita, MPd", "mapel" => "Seni Rupa & Seni Theater", "foto" => "assets/images/buindriana.jpg"],
    ["nama" => "Izra Isbullah Nasution, SPd", "mapel" => "Sejarah", "foto" => "assets/images/pakizra.jpg"],
    ["nama" => "Netti Purnama Sari Siregar, MPd", "mapel" => "Bahasa Indonesia", "foto" => "assets/images/bunetti.jpg"],
    ["nama" => "Nikky Aldrian Nasution, SPd", "mapel" => "Bimbingan Konseling", "foto" => "assets/images/paknikki.jpg"],
    ["nama" => "Normalia Amanda, MPd", "mapel" => "Kimia", "foto" => "assets/images/bulia.png"],
    ["nama" => "Nova Ricka, SPd", "mapel" => "Ekonomi", "foto" => "assets/images/bunova.jpg"],
    ["nama" => "Okta Marestu, SPd", "mapel" => "Olahraga", "foto" => "assets/images/pakokta.png"],
    ["nama" => "Seri Masria, SPd", "mapel" => "Geografi", "foto" => "assets/images/buseri.jpg"],
    ["nama" => "Silvi Anggraini Rahman, SPd, MSi", "mapel" => "Matematika", "foto" => "assets/images/busilvi.jpg"],
    ["nama" => "Vanisha Adila, SPd", "mapel" => "Sosiologi", "foto" => "assets/images/buvanisha.jpg"],  
    ["nama" => "Sity Winna Wati, SPd", "mapel" => "Prakarya", "foto" => "assets/images/buwinna.jpg"],
    ["nama" => "Widharmawanta Ginting, MPd", "mapel" => "Bahasa Inggis", "foto" => "assets/images/pakdarma.jpg"],
    ["nama" => "Khoirul Tarmidzi, S.Kom", "mapel" => "Informatika", "foto" => "assets/images/pakkhoir.png"],
];

// Setup Pagination
// Setup Pagination
$total = count($gurus);
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
if ($page < 1) $page = 1;

$perPage = 8; // tampilkan 8 guru per halaman
$totalPages = ceil($total / $perPage);

$start = ($page - 1) * $perPage;
$currentGurus = array_slice($gurus, $start, $perPage);
?>

<!-- Hero Tenaga Pendidik -->
<section class="guru-hero">
  <div class="overlay"></div>
  <div class="hero-content">
    <h1>Tenaga <span>Pendidik</span></h1>
    <p>Profil Kepala Sekolah, Wakil Kepala Sekolah, Bendahara, Tata Usaha dan Guru Pengajar.</p>
  </div>
</section>

<?php if ($page == 1): ?>
<!-- Kepala Sekolah -->
<section class="kepala-sekolah">
  <div class="container">
    <h2>Kepala <span>Sekolah</span></h2>
    <div class="kepala-card">
      <img src="assets/images/pakridho.jpg" alt="Kepala Sekolah">
      <h3>Muhammad Ridho Irhamna, SPd, MLi.</h3>
      <p>Kepala Sekolah</p>
    </div>
  </div>
</section>

<!-- Wakil Kepala Sekolah -->
<section class="wakil-section">
  <div class="container">
    <h2>Wakil Kepala <span>Sekolah</span></h2>
    <div class="wakil-grid">
      <div class="wakil-card">
        <img src="assets/images/bulia.png" alt="Wakil Kurikulum">
        <h3>Normalia Amanda, MPd</h3>
        <p>Bidang Kurikulum</p>
      </div>
      <div class="wakil-card">
        <img src="assets/images/budedek.jpg" alt="Wakil Kesiswaan">
        <h3>Dedek Elen Enjelina, SPd</h3>
        <p>Bidang Kesiswaan</p>
      </div>
      <div class="wakil-card">
        <img src="assets/images/pakokta.png" alt="Wakil Sarpras">
        <h3>Okta Marestu, SPd</h3>
        <p>Bidang Sarana Prasarana</p>
      </div>
    </div>
  </div>
</section>

<!-- Bendahara & Tata Usaha -->
<section class="bendahara-tatausaha-section">
  <div class="container">
    <h2><span>Bendahara</span> & Tata Usaha</h2>
    <div class="bendahara-tatausaha-grid">
      <div class="bendahara-tatausaha-card">
        <img src="assets/images/bueva.jpg" alt="Bendahara">
        <h3>Eva Malini Munthe, SE</h3>
        <p>Bendahara</p>
      </div>
      <div class="bendahara-tatausaha-card">
        <img src="assets/images/buhariati.jpg" alt="Tata Usaha">
        <h3>Harianti, AMD</h3>
        <p>Staf Tata Usaha</p>
      </div>
    </div>
  </div>
</section>

<?php endif; ?>

<!-- Daftar Guru -->
<section class="guru-section">
  <div class="container">
    <div class="guru-header">
      <h2>Daftar <span>Guru</span></h2>
      <p>Berikut adalah guru-guru pengajar di SMA Pertiwi Medan.</p>
    </div>

    <div class="guru-grid">
      <?php foreach ($currentGurus as $guru): ?>
        <div class="guru-card">
          <img src="<?= $guru['foto'] ?>" alt="<?= $guru['nama'] ?>">
          <h3><?= $guru['nama'] ?></h3>
          <p><?= $guru['mapel'] ?></p>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Pagination -->
    <div class="pagination">
      <?php if ($page > 1): ?>
        <a href="?page=<?= $page - 1 ?>" class="prev">←</a>
      <?php endif; ?>

      <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?= $i ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
      <?php endfor; ?>

      <?php if ($page < $totalPages): ?>
        <a href="?page=<?= $page + 1 ?>" class="next">→</a>
      <?php endif; ?>
    </div>
  </div>
</section>

@include('layout.footer')