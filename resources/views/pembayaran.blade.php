@include('layout.header')

<div class="pay-container">
  <h2 class="pay-title">Pembayaran Pendaftaran SPMB</h2>

  <div class="pay-card">
    <p class="pay-desc">
      Silakan lakukan pembayaran biaya pendaftaran dan unggah bukti transfer.
    </p>

    <!-- RINCIAN -->
    <div class="pay-section">
      <h3>Rincian Pembayaran</h3>
      <div class="pay-box">
        <div class="pay-row"><span>Biaya Pendaftaran:</span> Rp 150.000</div>
        <div class="pay-row"><span>Biaya Administrasi:</span> Rp 10.000</div>
        <hr />
        <div class="pay-total">Total: <strong>Rp 160.000</strong></div>
      </div>
    </div>

    <!-- METODE -->
    <div class="pay-section">
      <h3>Pilih Metode Pembayaran</h3>

      <div class="pay-method-container">
        <div class="pay-method-card" data-method="bri">
          <img src="assets/images/logobri.png" />
          <span>Bank BRI</span>
        </div>
        <div class="pay-method-card" data-method="mandiri">
          <img src="assets/images/logomandiri.png" />
          <span>Bank Mandiri</span>
        </div>
        <div class="pay-method-card" data-method="bca">
          <img src="assets/images/logobca.png" />
          <span>Bank BCA</span>
        </div>
        <div class="pay-method-card" data-method="qris">
          <img src="assets/images/logoqris.png" />
          <span>QRIS</span>
        </div>
      </div>

      <!-- DETAIL -->
      <div class="pay-detail-box" id="payDetail_bri">
        <strong>Bank BRI</strong>
        <p>No Rekening: 1234567890</p>
        <p>a.n SMA Pertiwi Medan</p>
      </div>

      <div class="pay-detail-box" id="payDetail_mandiri">
        <strong>Bank Mandiri</strong>
        <p>No Rekening: 987654321</p>
        <p>a.n SMA Pertiwi Medan</p>
      </div>

      <div class="pay-detail-box pay-center" id="payDetail_qris">
        <strong>QRIS</strong><br />
        <img src="assets/images/qrcode.png" class="pay-qris" />
      </div>
    </div>

    <!-- UPLOAD -->
    <div class="pay-section">
      <h3>Upload Bukti Pembayaran</h3>
      <input
        type="file"
        id="proofInput"
        accept="image/*,application/pdf"
        disabled
      />
      <img id="previewImage" style="display:none; max-width:200px; margin-top:10px;">
    </div>

    <button class="pay-btn" disabled>Kirim Bukti Pembayaran</button>
  </div>
</div>

<!-- POPUP -->
<div id="spmbPopupOverlay" class="spmb-popup-overlay">
  <div class="spmb-popup-box">
    <i class="fas fa-check-circle"></i>
    <h2>Bukti Pembayaran Dikirim</h2>
    <p>
      Bukti pembayaran berhasil dikirim dan sedang menunggu verifikasi admin.
    </p>
    <button onclick="closePopup()">OK</button>
  </div>
</div>
<script>
  const cards = document.querySelectorAll('.pay-method-card');
  const details = document.querySelectorAll('.pay-detail-box');
  const proofInput = document.getElementById('proofInput');
  const submitBtn = document.querySelector('.pay-btn');
  const preview = document.getElementById('previewImage');

  let methodSelected = false;
  let fileUploaded = false;

  cards.forEach(card => {
    card.addEventListener('click', () => {
      cards.forEach(c => c.classList.remove('active'));
      card.classList.add('active');

      details.forEach(d => d.classList.remove('active'));
      document.getElementById('payDetail_' + card.dataset.method)
        ?.classList.add('active');

      methodSelected = true;
      proofInput.disabled = false;
      updateButton();
    });
  });

  proofInput.addEventListener('change', e => {
    const file = e.target.files[0];
    if (!file) return;

    fileUploaded = true;
    updateButton();

    if (file.type.startsWith('image')) {
      const reader = new FileReader();
      reader.onload = () => {
        preview.src = reader.result;
        preview.style.display = 'block';
      };
      reader.readAsDataURL(file);
    }
  });

  function updateButton() {
    submitBtn.disabled = !(methodSelected && fileUploaded);
  }

  submitBtn.addEventListener('click', () => {
    document.getElementById('spmbPopupOverlay').classList.add('show');
  });

  function closePopup() {
    document.getElementById('spmbPopupOverlay').classList.remove('show');
  }
</script>

@include('layout.footer')
