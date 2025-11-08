@include('layout.header')
<section class="spmb-container">
  <div class="spmb-content">
    <h1><span>SPMB</span> - SMA Pertiwi Medan</h1>
    <p>Pendaftaran siswa baru akan segera dibuka! Siapkan dirimu dan jangan lewatkan tanggalnya.</p>

    <!-- Countdown -->
    <div class="countdown" id="countdown">
      <div class="count-box">
        <span id="days">00</span>
        <p>Hari</p>
      </div>
      <div class="count-box">
        <span id="hours">00</span>
        <p>Jam</p>
      </div>
      <div class="count-box">
        <span id="minutes">00</span>
        <p>Menit</p>
      </div>
      <div class="count-box">
        <span id="seconds">00</span>
        <p>Detik</p>
      </div>
    </div>

    <p class="spmb-note">
      <i class="fas fa-clock"></i>
      Pendaftaran dibuka pada <strong>Januari 2026</strong>. Nantikan informasi selanjutnya di website resmi sekolah kami.
    </p>
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
