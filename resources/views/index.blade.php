@include('layout.header')

<section class="hero">
  <div class="hero-overlay"></div>
  <div class="container hero-content">
    <div class="hero-text">
  <p>SEKOLAH MENENGAH ATAS</p>
  <h2>SMA PERTIWI MEDAN</h2>
  <p class="motivasi">“Kesuksesan bukan hanya tentang mimpi, tapi tentang keberanian untuk berjuang dan berdoa mewujudkannya.”</p>
</div>
    <div class="hero-image">
      <img src="{{ asset('assets/images/siswa.png') }}" alt="Siswa SMA Pertiwi Medan">
    </div>
  </div>
</section>

<!-- Ikon Cepat -->
<section class="quick-links">
  <div class="container quick-grid">
    <a href="{{ url('/sambutan') }}" class="card">
      <img src="{{ asset('assets/icon/sambutan.svg') }}" alt="">
      <p>Sambutan</p>
    </a>
    <a href="{{ url('/visimisi') }}" class="card">
      <img src="{{ asset('assets/icon/visi.svg') }}" alt="">
      <p>Visi & Misi</p>
    </a>
    <a href="{{ url('/hasilspmb') }}" class="card">
      <img src="{{ asset('assets/icon/hasil.svg') }}" alt="">
      <p>Hasil SPMB</p>
    </a>
    <a href="{{ url('/eskul') }}" class="card">
      <img src="{{ asset('assets/icon/eskul.svg') }}" alt="">
      <p>Ekskul</p>
    </a>
    <a href="{{ url('/fasilitas') }}" class="card">
      <img src="{{ asset('assets/icon/fasilitas.svg') }}" alt="">
      <p>Fasilitas</p>
    </a>
    <a href="{{ url('/galeri') }}" class="card">
      <img src="{{ asset('assets/icon/galeri.svg') }}" alt="">
      <p>Galeri</p>
    </a>
  </div>
</section>

<!-- Tentang Kami -->
<section class="tentang">
  <div class="container tentang-wrapper">
    <div class="tentang-text">
      <h2>Tentang Kami</h2>
      <div class="line"></div>
      <p>
        SMA Pertiwi Medan adalah lembaga pendidikan menengah atas yang dikelola langsung oleh Pemerintah Kota Medan. Dengan visi menjadi sekolah unggulan yang berkarakter, kreatif, dan berdaya saing, SMA Pertiwi Medan berkomitmen untuk mencetak generasi muda yang cerdas, berakhlak mulia, serta siap menghadapi perkembangan zaman.
      </p>
      <a href="{{ url('/profil') }}" class="btn-primary">Lihat Selengkapnya</a>
    </div>

    <div class="tentang-image">
      <div class="image-frame">
        <img src="{{ asset('assets/images/guru.jpg') }}" alt="Foto SMA Pertiwi Medan">
      </div>
      <div class="image-decor"></div>
    </div>
  </div>
</section>

<!-- Berita -->
<section class="news-section">
  <div class="container">
    <div class="section-header">
      <h2>Berita Terbaru</h2>
      <p>Informasi penting, pengumuman, dan artikel dari sekolah.</p>
    </div>

    <div class="filter-buttons">
      <button class="active" onclick="filterNews('semua', event)">Semua</button>
      <button onclick="filterNews('pengumuman', event)">Pengumuman</button>
      <button onclick="filterNews('berita', event)">Berita</button>
      <button onclick="filterNews('artikel', event)">Artikel</button>
    </div>

    <div class="news-grid">
      @forelse ($artikels as $item)
        <div class="news-card" data-type="{{ strtolower(trim($item->post_as ?? 'artikel')) }}" data-timestamp="{{ \Carbon\Carbon::parse($item->published_at)->timestamp }}">
          <div class="news-image">
            <img src="{{ $item->thumbnail ? asset('storage/' . $item->thumbnail) : asset('assets/images/no-image.png') }}" alt="{{ $item->tittle }}">
            <span class="badge {{ strtolower($item->post_as ?? 'artikel') }}">
              {{ ucfirst($item->post_as ?? 'Artikel') }}
            </span>
          </div>
          <div class="news-content">
            <h3>{{ $item->tittle }}</h3>
            <p>{{ \Illuminate\Support\Str::limit(strip_tags($item->content), 120, '...') }}</p>
            <div class="news-footer">
              <small>{{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('d M Y') }}</small>
              <a href="{{ route('artikel.show', $item->id) }}" class="read-more">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
      @empty
        <p style="text-align:center;">Belum ada berita tersedia.</p>
      @endforelse
    </div>

    @if ($artikels->count() >= 3)
      <div class="view-all">
        <a href="{{ route('artikel.index') }}">Lihat Semua Berita</a>
      </div>
    @endif
  </div>
</section>

<script>
function filterNews(type, event) {
    const cards = Array.from(document.querySelectorAll('.news-card'));
    const buttons = document.querySelectorAll('.filter-buttons button');

    // Hapus active class
    buttons.forEach(btn => btn.classList.remove('active'));
    if(event) event.target.classList.add('active');

    if(type === 'semua') {
        // Urutkan semua kartu berdasarkan data-timestamp descending
        const sortedCards = cards.sort((a, b) => b.dataset.timestamp - a.dataset.timestamp);
        sortedCards.forEach((card, index) => {
            card.style.display = (index < 6) ? 'block' : 'none';
        });
    } else {
        // Tampilkan kartu sesuai kategori
        cards.forEach(card => {
            card.style.display = (card.dataset.type === type) ? 'block' : 'none';
        });
    }
}
</script>

@include('layout.footer')
