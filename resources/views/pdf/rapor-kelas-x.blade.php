<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rapor Siswa</title>

    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 12px;
            margin: 30px;
        }

        .center { text-align: center; }
        .bold { font-weight: bold; }

        hr {
            border: 1px solid #000;
            margin: 8px 0 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 6px;
        }

        table, th, td {
            border: 1px solid #000;
        }

        th, td {
            padding: 5px;
            vertical-align: middle;
        }

        .no-border,
        .no-border td {
            border: none;
            padding: 3px;
        }

        .kop h3, .kop h4 {
            margin: 2px 0;
        }

        .small { font-size: 11px; }

        .mt-10 { margin-top: 10px; }
        .mt-20 { margin-top: 20px; }
        .mt-40 { margin-top: 40px; }
    </style>
</head>
<body>

{{-- KOP SEKOLAH --}}
<div class="center kop">
    <h3 class="bold">YAYASAN PERGURUAN PERTIWI KOTA MEDAN</h3>
    <h3 class="bold">SMA SWASTA PERTIWI</h3>
    <div class="small">
        Jl. Budi Persatuan No.1 Pulo Brayan – Kota Medan, 20116<br>
        Akreditasi A
    </div>
</div>

<hr>

<div class="center bold">
    LAPORAN HASIL BELAJAR PESERTA DIDIK<br>
    AKHIR SEMESTER
</div>

{{-- IDENTITAS --}}
<table class="no-border mt-10">
    <tr>
        <td width="20%">Nama Sekolah</td>
        <td width="30%">: SMA Swasta Pertiwi</td>
        <td width="20%">Kelas</td>
        <td width="30%">: X</td>
    </tr>
    <tr>
        <td>Nama Siswa</td>
        <td>: {{ $student->nama_lengkap }}</td>
        <td>Semester</td>
        <td>: {{ $rapor->semester }}</td>
    </tr>
    <tr>
        <td>Nomor Induk</td>
        <td>: {{ $student->nisn }}</td>
        <td>Tahun Pelajaran</td>
        <td>: {{ $rapor->tahun_ajaran }}</td>
    </tr>
</table>

{{-- NILAI --}}
<h4 class="mt-20">Nilai Hasil Pembelajaran</h4>

<table>
    <tr class="center bold">
        <th>No</th>
        <th>Mata Pelajaran</th>
        <th>Nilai</th>
    </tr>
    <tr>
        <td class="center">1</td>
        <td>Pendidikan Agama Islam</td>
        <td class="center">{{ $rapor->pai }}</td>
    </tr>
    <tr>
        <td class="center">2</td>
        <td>PPKn</td>
        <td class="center">{{ $rapor->ppkn }}</td>
    </tr>
    <tr>
        <td class="center">3</td>
        <td>Bahasa Indonesia</td>
        <td class="center">{{ $rapor->bahasa_indonesia }}</td>
    </tr>
    <tr>
        <td class="center">4</td>
        <td>Matematika</td>
        <td class="center">{{ $rapor->matematika }}</td>
    </tr>
    <tr>
        <td class="center">5</td>
        <td>Bahasa Inggris</td>
        <td class="center">{{ $rapor->bahasa_inggris }}</td>
    </tr>
    <tr>
        <td class="center">6</td>
        <td>Sejarah</td>
        <td class="center">{{ $rapor->sejarah }}</td>
    </tr>
    <tr>
        <td class="center">7</td>
        <td>Informatika</td>
        <td class="center">{{ $rapor->informatika }}</td>
    </tr>
    <tr>
        <td class="center">8</td>
        <td>PJOK</td>
        <td class="center">{{ $rapor->pjok }}</td>
    </tr>
</table>


{{-- AKHLAK & PENGEMBANGAN DIRI --}}
<h4 class="mt-20">Akhlak & Pengembangan Diri Siswa</h4>

<table>
    <tr class="bold center">
        <th width="60%">Komponen</th>
        <th width="40%">Predikat</th>
    </tr>
    <tr>
        <td>Pramuka</td>
        <td class="center">{{ $rapor->pramuka }}</td>
    </tr>
    <tr>
        <td>Disiplin</td>
        <td class="center">{{ $rapor->disiplin }}</td>
    </tr>
    <tr>
        <td>Sopan Santun</td>
        <td class="center">{{ $rapor->sopan_santun }}</td>
    </tr>
</table>

{{-- KETIDAKHADIRAN --}}
<h4 class="mt-20">Ketidakhadiran</h4>

<table>
    <tr class="center bold">
        <th>Sakit</th>
        <th>Izin</th>
        <th>Tanpa Keterangan</th>
    </tr>
    <tr class="center">
        <td>{{ $rapor->sakit }} Hari</td>
        <td>{{ $rapor->izin }} Hari</td>
        <td>{{ $rapor->alpha }} Hari</td>
    </tr>
</table>

{{-- CATATAN --}}
<h4 class="mt-20">Catatan Untuk Orang Tua / Wali</h4>
<table>
    <tr>
        <td style="height: 60px;"></td>
    </tr>
</table>

{{-- TANDA TANGAN --}}
<table class="no-border mt-40">
    <tr class="center">
        <td width="33%">
            Mengetahui,<br>
            Kepala Sekolah<br><br><br><br>
            ( __________________ )
        </td>
        <td width="33%">
            Orang Tua / Wali<br><br><br><br><br>
            ( __________________ )
        </td>
        <td width="33%">
            Wali Kelas<br><br><br><br>
            ( __________________ )
        </td>
    </tr>
</table>
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>

</body>
</html>
