@include('layout.header')

@php
  $namaHari = ["Sen", "Sel", "Rab", "Kam", "Jum", "Sab", "Min"];
@endphp

<!-- Hero Kalender -->
<section class="kalender-hero">
  <div class="overlay"></div>
  <div class="hero-content">
    <h1>Kalender <span>Pendidikan {{ $tahun }}</span></h1>
    <p>Informasi libur, ujian, dan kegiatan sekolah sepanjang tahun.</p>
  </div>
</section>

<!-- Kalender -->
<section class="kalender-section">
  <div class="container">
    <div class="kalender-header">
      <h2>Kalender Tahun <span>{{ $tahun }}</span></h2>
      <p>Berikut jadwal penting SMA Pertiwi Medan selama {{ $tahun }}.</p>
    </div>

    <div class="kalender-grid">
      @for ($bulan = 1; $bulan <= 12; $bulan++)
        @php
          $jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
          $namaBulan = date("F", mktime(0, 0, 0, $bulan, 1, $tahun));
          $firstDayWeek = (date("N", strtotime("$tahun-$bulan-01")) % 7);
        @endphp

        <div class="kalender-bulan">
          <h3>{{ $namaBulan }}</h3>
          <div class="kalender-grid-bulan">
            @foreach ($namaHari as $nh)
              <div class="nama-hari">{{ $nh }}</div>
            @endforeach

            {{-- Kosong sebelum tanggal 1 --}}
            @for ($blank = 0; $blank < $firstDayWeek; $blank++)
              <div class="hari kosong"></div>
            @endfor

            {{-- Loop tanggal --}}
            @for ($hari = 1; $hari <= $jumlahHari; $hari++)
              @php
                $tanggal = sprintf("%04d-%02d-%02d", $tahun, $bulan, $hari);
                $kelasEvent = '';
                $eventHari = $events[$tanggal] ?? null;

                if ($eventHari) {
                    foreach ($eventHari as $ev) {
                        $kategori = strtolower($ev['kategori']);
                        if ($kategori === 'libur') $kelasEvent = 'libur';
                        elseif ($kategori === 'ujian') $kelasEvent = 'ujian';
                        elseif ($kategori === 'acara' || $kategori === 'acara sekolah') $kelasEvent = 'acara';
                    }
                }
              @endphp

              <div class="hari {{ $kelasEvent }}">
                <span>{{ $hari }}</span>
                @if ($eventHari)
                  <div class="event-popup">
                    @foreach ($eventHari as $ev)
                      <p>
                        <strong>{{ $ev['judul'] }}</strong><br>
                        {{ ucfirst($ev['kategori']) }}
                      </p>
                    @endforeach
                  </div>
                @endif
              </div>
            @endfor
          </div>
        </div>
      @endfor
    </div>
  </div>
</section>

<!-- Keterangan -->
<div class="kalender-legend">
  <h4>Keterangan:</h4>
  <ul>
    <li><span class="box libur"></span> Libur</li>
    <li><span class="box ujian"></span> Ujian</li>
    <li><span class="box acara"></span> Acara Sekolah</li>
    <li><span class="box biasa"></span> Hari Biasa</li>
  </ul>
</div>

@include('layout.footer')
