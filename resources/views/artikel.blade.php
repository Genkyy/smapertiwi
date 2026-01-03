@include('layout.header')

<main class="container">
    <section class="artikel-section">

        {{-- HEADER --}}
        <div class="artikel-header">
            <h2>Berita Terbaru Di <span class="highlight">SMA Pertiwi</span></h2>
            <p>Kumpulan berita terbaru dan informasi menarik tentang kegiatan di SMA Pertiwi.</p>
        </div>

        {{-- SEARCH --}}
        <form action="" method="GET" class="artikel-search">
            <input 
                type="text" 
                name="search" 
                placeholder="Cari artikel..." 
                value="{{ request('search') }}"
            >
            <button type="submit">Cari</button>
        </form>

        {{-- GRID ARTIKEL --}}
        <div class="artikel-grid">
            @forelse ($artikels as $a)
                <div class="artikel-card">

                    {{-- GAMBAR --}}
                    <img 
                        src="{{ $a->thumbnail ? asset('storage/' . $a->thumbnail) : asset('assets/images/no-image.png') }}"
                        alt="{{ $a->title ?? 'Artikel' }}" 
                        loading="lazy"
                    >

                    <div class="artikel-content">
                        <span class="artikel-tag">{{ $a->post_as ?? 'Artikel' }}</span>

                        <span class="artikel-date">
                            {{ $a->published_at ? \Carbon\Carbon::parse($a->published_at)->translatedFormat('d F Y') : '-' }}
                        </span>

                        <h3>{{ $a->title }}</h3>

                        <p class="artikel-excerpt">
                            {{ \Illuminate\Support\Str::limit(strip_tags($a->content), 150, '...') }}
                        </p>

                        <a href="{{ route('artikel.show', $a->id) }}">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
            @empty
                <p style="text-align:center; margin-top:30px;">
                    Belum ada artikel yang tersedia.
                </p>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        @if ($artikels->hasPages())
            <div class="pagination-custom">

                {{-- Prev --}}
                @if ($artikels->onFirstPage())
                    <span class="disabled">« Prev</span>
                @else
                    <a href="{{ $artikels->previousPageUrl() }}">« Prev</a>
                @endif

                {{-- Numbers --}}
                @foreach ($artikels->getUrlRange(1, $artikels->lastPage()) as $page => $url)
                    @if ($page == $artikels->currentPage())
                        <span class="active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach

                {{-- Next --}}
                @if ($artikels->hasMorePages())
                    <a href="{{ $artikels->nextPageUrl() }}">Next »</a>
                @else
                    <span class="disabled">Next »</span>
                @endif
            </div>

            {{-- INFO TOTAL ARTIKEL --}}
            <p class="total-artikel-info">
                Total artikel: {{ $artikels->total() }}
            </p>
        @endif

    </section>
</main>

@include('layout.footer')
