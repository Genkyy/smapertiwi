@include('layout.header')

<?php
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;

// ============================
// 🧠 Ambil filter dari URL
// ============================
$filterTahun = $_GET['tahun'] ?? date('Y');
$filterBulan = $_GET['bulan'] ?? '';

// ============================
// 📦 Ambil data dari database
// ============================
$query = Gallery::query()
     ->whereYear('tanggal', $filterTahun)
    ->orderBy(DB::raw('MONTH(tanggal)'), 'asc')
    ->orderBy(DB::raw('DAY(tanggal)'), 'asc');

if ($filterBulan) {
    $query->whereMonth('tanggal', date('m', strtotime($filterBulan)));
}

$galleries = $query->get();

// ============================
// 📅 Kelompokkan per bulan dan urutkan berdasar waktu
// ============================
$dokumentasi = $galleries->groupBy(function ($item) {
    return \Carbon\Carbon::parse($item->tanggal)->translatedFormat('F');
});

// ============================
// 📜 Pagination manual per bulan
// ============================
$bulanList = array_keys($dokumentasi->toArray());
$totalBulan = count($bulanList);
$perPage = 3;
$totalPage = max(1, ceil($totalBulan / $perPage));
$page = max(1, min((int)($_GET['page'] ?? 1), $totalPage));
$start = ($page - 1) * $perPage;
$bulanPage = array_slice($bulanList, $start, $perPage);
?>

<!-- ===========================
     HERO
=========================== -->
<section class="dokumentasi-hero">
  <div class="overlay"></div>
  <div class="hero-content">
    <h1>Galeri Kegiatan <span><?= htmlspecialchars($filterTahun) ?></span></h1>
    <p>Kumpulan dokumentasi kegiatan SMA Pertiwi sepanjang tahun.</p>
  </div>
</section>

<!-- ===========================
     FILTER
=========================== -->
<section class="filter-section container">
  <form method="GET" class="filter-form">
    <select name="tahun">
      <?php
      $tahunList = Gallery::select('tahun')->distinct()->orderBy('tahun', 'desc')->pluck('tahun');
      foreach ($tahunList as $tahun): ?>
        <option value="<?= $tahun ?>" <?= $filterTahun == $tahun ? 'selected' : '' ?>><?= $tahun ?></option>
      <?php endforeach; ?>
    </select>

    <select name="bulan">
      <option value="">Semua Bulan</option>
      <?php
      $bulanListAll = Gallery::select('bulan')->distinct()->pluck('bulan');
      foreach ($bulanListAll as $bulan): ?>
        <option value="<?= $bulan ?>" <?= $filterBulan == $bulan ? 'selected' : '' ?>><?= $bulan ?></option>
      <?php endforeach; ?>
    </select>

    <button type="submit">Tampilkan</button>
  </form>
</section>

<!-- ===========================
     DOKUMENTASI
=========================== -->
<section class="dokumentasi-section">
  <div class="container">
    <?php if ($galleries->isEmpty()): ?>
      <p class="no-data">Tidak ada dokumentasi untuk tahun ini.</p>
    <?php else: ?>
      <?php foreach ($bulanPage as $bulan): ?>
        <div class="dokumentasi-bulan">
          <h2><?= htmlspecialchars($bulan . ' ' . $filterTahun); ?></h2>

          <div class="dokumentasi-grid">
            <?php
            $fotoList = $dokumentasi[$bulan];
            $fotoAwal = $fotoList->take(3);
            $sisaFoto = $fotoList->count() - 3;
            foreach ($fotoAwal as $ev): ?>
              <div class="dokumentasi-card">
                <img src="<?= asset('storage/' . $ev->foto); ?>" alt="<?= htmlspecialchars($ev->judul); ?>" class="lightbox-trigger">
                <div class="dokumentasi-content">
                  <span class="tanggal"><?= \Carbon\Carbon::parse($ev->tanggal)->translatedFormat('d F Y'); ?></span>
                  <h3><?= htmlspecialchars($ev->judul); ?></h3>
                  <p><?= htmlspecialchars($ev->deskripsi); ?></p>
                </div>
              </div>
            <?php endforeach; ?>

            <?php if ($sisaFoto > 0): ?>
              <div class="lihat-semua" onclick="toggleFoto(this)">
                <span>Lihat Semua Foto (<?= $fotoList->count(); ?>)</span>
              </div>

              <div class="foto-tersembunyi" style="display:none;">
                <?php foreach ($fotoList->skip(3) as $ev): ?>
                  <div class="dokumentasi-card">
                    <img src="<?= asset('storage/' . $ev->foto); ?>" alt="<?= htmlspecialchars($ev->judul); ?>" class="lightbox-trigger">
                    <div class="dokumentasi-content">
                      <span class="tanggal"><?= \Carbon\Carbon::parse($ev->tanggal)->translatedFormat('d F Y'); ?></span>
                      <h3><?= htmlspecialchars($ev->judul); ?></h3>
                      <p><?= htmlspecialchars($ev->deskripsi); ?></p>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>

      <!-- PAGINATION -->
      <div class="pagination">
        <?php if ($page > 1): ?>
          <a href="?page=<?= $page - 1 ?>&tahun=<?= $filterTahun ?>&bulan=<?= $filterBulan ?>">&laquo; Sebelumnya</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPage; $i++): ?>
          <a href="?page=<?= $i ?>&tahun=<?= $filterTahun ?>&bulan=<?= $filterBulan ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
        <?php endfor; ?>

        <?php if ($page < $totalPage): ?>
          <a href="?page=<?= $page + 1 ?>&tahun=<?= $filterTahun ?>&bulan=<?= $filterBulan ?>">Berikutnya &raquo;</a>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
</section>

<!-- ===========================
     LIGHTBOX
=========================== -->
<div id="lightbox">
  <img id="lightbox-img" src="" alt="Preview Gambar">
</div>

<script>
function toggleFoto(button) {
  const hiddenPhotos = button.nextElementSibling;
  const span = button.querySelector('span');
  if (hiddenPhotos.style.display === "none") {
    hiddenPhotos.style.display = "grid";
    span.innerText = "Sembunyikan Foto";
  } else {
    hiddenPhotos.style.display = "none";
    const total = hiddenPhotos.querySelectorAll('.dokumentasi-card').length + 3;
    span.innerText = "Lihat Semua Foto (" + total + ")";
  }
}

document.querySelectorAll('.lightbox-trigger').forEach(img => {
  img.addEventListener('click', () => {
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    lightboxImg.src = img.src;
    lightbox.style.display = 'flex';
  });
});
document.getElementById('lightbox').addEventListener('click', e => {
  if (e.target.id === 'lightbox') e.target.style.display = 'none';
});
</script>

@include('layout.footer')
