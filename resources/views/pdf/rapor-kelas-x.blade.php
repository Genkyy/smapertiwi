<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Raport Siswa</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 12px;
        }
        .center {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 6px;
        }
        .no-border td {
            border: none;
            padding: 2px;
        }
    </style>
</head>
<body>

{{-- HEADER --}}
<div class="center">
    <h3>RAPORT PESERTA DIDIK</h3>
    <h4>SMA PERTIWI</h4>
</div>

<hr>

{{-- IDENTITAS SISWA --}}
<table class="no-border">
    <tr>
        <td>Nama Siswa</td>
        <td>: {{ $student->nama_lengkap }}</td>
        <td>Kelas</td>
        <td>: X</td>
    </tr>
    <tr>
        <td>NISN</td>
        <td>: {{ $student->nisn }}</td>
        <td>Semester</td>
        <td>: {{ $rapor->semester }}</td>
    </tr>
    <tr>
        <td>Jurusan</td>
        <td>: {{ $student->jurusan }}</td>
        <td>Tahun Ajaran</td>
        <td>: {{ $rapor->tahun_ajaran }}</td>
    </tr>
</table>

{{-- NILAI AKADEMIK --}}
<h4>A. Nilai Akademik</h4>
<table>
    <tr>
        <th>No</th>
        <th>Mata Pelajaran</th>
        <th>Nilai</th>
    </tr>
    <tr><td>1</td><td>Pendidikan Agama Islam</td><td>{{ $rapor->pai }}</td></tr>
    <tr><td>2</td><td>PPKn</td><td>{{ $rapor->ppkn }}</td></tr>
    <tr><td>3</td><td>Bahasa Indonesia</td><td>{{ $rapor->bahasa_indonesia }}</td></tr>
    <tr><td>4</td><td>Matematika</td><td>{{ $rapor->matematika }}</td></tr>
    <tr><td>5</td><td>Bahasa Inggris</td><td>{{ $rapor->bahasa_inggris }}</td></tr>
</table>

{{-- PENGEMBANGAN DIRI --}}
<h4>B. Pengembangan Diri</h4>
<table>
    <tr>
        <th>Kegiatan</th>
        <th>Predikat</th>
    </tr>
    <tr>
        <td>Pramuka</td>
        <td>{{ $rapor->pramuka }}</td>
    </tr>
    <tr>
        <td>OSIS</td>
        <td>{{ $rapor->osis }}</td>
    </tr>
</table>

{{-- AKHLAK --}}
<h4>C. Akhlak & Kepribadian</h4>
<table>
    <tr>
        <th>Aspek</th>
        <th>Predikat</th>
    </tr>
    <tr><td>Disiplin</td><td>{{ $rapor->disiplin }}</td></tr>
    <tr><td>Tanggung Jawab</td><td>{{ $rapor->tanggung_jawab }}</td></tr>
    <tr><td>Sopan Santun</td><td>{{ $rapor->sopan_santun }}</td></tr>
</table>

{{-- KETIDAKHADIRAN --}}
<h4>D. Ketidakhadiran</h4>
<table>
    <tr>
        <th>Sakit</th>
        <th>Izin</th>
        <th>Alpha</th>
    </tr>
    <tr>
        <td>{{ $rapor->sakit }}</td>
        <td>{{ $rapor->izin }}</td>
        <td>{{ $rapor->alpha }}</td>
    </tr>
</table>

<br><br>

{{-- TTD --}}
<table class="no-border">
    <tr>
        <td width="50%" class="center">
            Mengetahui,<br>
            Kepala Sekolah<br><br><br>
            ( __________________ )
        </td>
        <td width="50%" class="center">
            Wali Kelas<br><br><br><br>
            ( __________________ )
        </td>
    </tr>
</table>

</body>
</html>
