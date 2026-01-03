
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SMA PERTIWI MEDAN</title>

  <!-- Favicon -->
  <link rel="icon" href="/sekolah/assets/icon/pertiwi.png" type="image/png">

  <!-- Google Fonts (font tampil rapi seperti sebelumnya) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

  <!-- Main CSS (path fix, sesuai struktur  di C:\xampp\htdocs\sekolah\dist\css\style.css) -->
  <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}?v={{ time() }}">
</head>

<body>
  <!-- Header -->
  <header>
    <div class="container header-container">
      <div class="logo">
        <img src="{{ asset('assets/images/sma.png') }}" alt="Logo SMA Pertiwi Medan" class="school-logo">
    
      </div>

      <!-- NAV MENU -->
      <nav>
        <ul class="menu">
          <li><a href="{{ url('/') }}">Beranda</a></li>

          <li class="dropdown">
            <a href="#">Profil <i class="fa-solid fa-caret-down"></i></a>
            <ul class="submenu">
              <li><a href="{{ url('/profil') }}">Profil Sekolah</a></li>
              <li><a href="{{ url('/visimisi') }}">Visi & Misi</a></li>
              <li><a href="{{ url('/tenagapendidik') }}">Tenaga Pendidik</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#">Informasi <i class="fa-solid fa-caret-down"></i></a>
            <ul class="submenu">
              <li><a href="{{ url('/artikel') }}">Artikel</a></li>
              <li><a href="{{ url('/kalender') }}">Kalender</a></li>
            </ul>
          </li>

          <li><a href="{{ url('/kontak') }}">Kontak</a></li>

          <li>
            <a href="{{ url('/spmb') }}" class="btn-daftar">
              <i class="fa-solid fa-graduation-cap"></i> SPMB
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <!-- ===== NAVBAR MOBILE ===== -->
    <div class="navbar-mobile">
      <button class="menu-toggle" id="menuToggle">
        <i class="fas fa-bars"></i>
      </button>

      <a href="/" class="nav-center">
        <img src="assets/images/sma.png" alt="Logo SMA Pertiwi Medan" class="nav-logo">
      </a>

      <a href="{{ url('/spmb') }}" class="btn-spmb">SPMB</a>
    </div>

    <!-- MENU DROPDOWN MOBILE -->
    <nav class="mobile-menu" id="mobileMenu">
      <ul>
        <li><a href="{{ url('/') }}">Beranda</a></li>
        <li><a href="{{ url('/profil') }}">Profil Sekolah</a></li>
        <li><a href="{{ url('/visimisi') }}">Visi & Misi</a></li>
        <li><a href="{{ url('/tenagapendidik') }}">Tenaga Pendidik</a></li>
        <li><a href="{{ url('/artikel') }}">Artikel</a></li>
        <li><a href="{{ url('/kalender') }}">Kalender</a></li>
        <li><a href="{{ url('/kontak') }}">Kontak</a></li>
      </ul>
    </nav>
  </div>
  </header>
