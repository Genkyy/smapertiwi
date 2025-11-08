@include('layout.header')
<link rel="stylesheet" href="assets/css/kontak.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<section class="kontak-container">
  <!-- BAGIAN MAP -->
  <div class="kontak-map">
   <iframe 
  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63752.00426042008!2d98.5887052!3d3.6234654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303132032ce173ad%3A0x924c6e7d9ba81482!2sJl.%20Budi%20Kemakmuran%20No.4%2C%20Pulo%20Brayan%20Kota%2C%20Medan%20Barat%2C%20Medan%2C%20Sumatera%20Utara%2020239!5e0!3m2!1sid!2sid!4v1739549272213!5m2!1sid!2sid"
  allowfullscreen=""
  loading="lazy"
  referrerpolicy="no-referrer-when-downgrade">
</iframe>

  </div>

  <!-- BAGIAN INFORMASI KONTAK -->
  <div class="kontak-info">
    <div class="kontak-header">
      <img src="assets/images/logopertiwi.jpg" alt="Logo Sekolah">
      <h2>SMA Pertiwi Medan</h2>
      <p>Hubungi Kami</p>
    </div>

    <ul class="kontak-list">
      <li>
        <i class="fas fa-phone"></i>
        <div>
          <h4>Telepon</h4>
          <p>0813-6229-1258</p>
        </div>
      </li>
      <li>
        <i class="fas fa-envelope"></i>
        <div>
          <h4>Email</h4>
          <p>smaspertiwimedan@gmail.com</p>
        </div>
      </li>
      <li>
        <i class="fas fa-map-marker-alt"></i>
        <div>
          <h4>Alamat</h4>
          <p>Jalan Budi Persatuan No.1, Kec. Medan Barat, Kota Medan, Sumatera Utara</p>
        </div>
      </li>
    </ul>

    <!-- TOMBOL HUBUNGI SEKARANG -->
    <div class="kontak-action">
      <h3>Hubungi Sekarang</h3>
      <a href="https://wa.me/6281362291258?text=Halo%20SMA%20Pertiwi%20Medan%2C%20saya%20ingin%20bertanya%20lebih%20lanjut." 
         target="_blank" 
         class="btn-wa">
        <i class="fab fa-whatsapp"></i> Chat via WhatsApp
      </a>
    </div>
  </div>
</section>

@include('layout.footer')
