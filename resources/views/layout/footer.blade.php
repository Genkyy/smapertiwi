<footer class="site-footer">
  <div class="footer-inner">
    <!-- Logo Sekolah -->
    <div class="footer-col logo">
      <img src="{{ asset('assets/images/sma.png') }}" alt="Logo SMA Pertiwi Medan" class="school-logo">
    
    </div>
    <div class="footer-col contact">
      <h3>Hubungi Kami</h3>
      <p><img src="{{ asset('assets/images/gmail.png') }}" alt="email"> smaspertiwimedan@gmail.com</p>
      <p><img src="{{ asset('assets/images/whatsapp.png') }}" alt="whatsapp"> 0813-6229-1258</p>
      <p><img src="{{ asset('assets/images/map.png') }}" alt="lokasi"> Jl. Budi Persatuan No.1, Medan Barat</p>
    </div>

    <div class="footer-col follow">
      <h3>Ikuti Kami</h3>
      <div class="footer-social">
        <a href="https://web.facebook.com/SMAPertiwiMedan.co.sch"><img src="{{ asset('assets/images/facebook.png') }}" alt="facebook"></a>
        <a href="https://www.instagram.com/smapertiwimedan"><img src="{{ asset('assets/images/instagram.png') }}" alt="instagram"></a>
        <a href="https://www.youtube.com/@smapertiwimedan8116"><img src="{{ asset('assets/images/youtube.png') }}" alt="youtube"></a>
      </div>
      <p class="motto">"Belajar. Berkarya. Berprestasi."</p>
    </div>
  </div>

  <div class="footer-bottom">
    <p>© 2025 SMA Pertiwi Medan.</p>
  </div>
</footer>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const toggle = document.getElementById('menuToggle');
  const mobileMenu = document.getElementById('mobileMenu');

  toggle.addEventListener('click', function() {
    mobileMenu.classList.toggle('active');
  });
});
</script>
  