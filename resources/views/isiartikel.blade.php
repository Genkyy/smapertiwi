@include('layout.header')

<main class="container">
  <section class="artikel-hero">
    <img src="{{ $artikel->thumbnail_url }}" alt="{{ $artikel->tittle }}">
    <div class="overlay"></div>
    <div class="hero-text">
      <span class="artikel-tag">{{ $artikel->post_as ?? 'Artikel' }}</span>
      <h1>{{ $artikel->tittle }}</h1>
      <p class="artikel-meta">
        Ditulis oleh <strong>{{ $artikel->author ?? 'Admin' }}</strong> •
        {{ \Carbon\Carbon::parse($artikel->published_at)->translatedFormat('d F Y') }}
      </p>
    </div>
  </section>

  <section class="artikel-detail">
    <div class="content">
      {!! $artikel->content !!}
    </div>

    <div class="artikel-nav">
      <a href="{{ route('artikel.index') }}" class="back-btn">← Kembali ke Artikel</a>
    </div>
  </section>
</main>

@include('layout.footer')
