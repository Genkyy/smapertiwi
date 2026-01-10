<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>CV Siswa</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        h2 {
            text-align: center;
            margin-bottom: 5px;
        }
        .section {
            margin-top: 15px;
        }
        .section-title {
            font-weight: bold;
            border-bottom: 1px solid #000;
            margin-bottom: 5px;
        }
        table {
            width: 100%;
        }
        td {
            padding: 3px 5px;
            vertical-align: top;
        }
        .label {
            width: 30%;
            font-weight: bold;
        }
        .photo {
            text-align: right;
        }
        img {
            width: 120px;
            border: 1px solid #000;
        }
    </style>
</head>
<body>

<h2>DATA DIRI SISWA</h2>

<table>
    <tr>
        <td>
            <table>
                <tr><td class="label">Nama Lengkap</td><td>: {{ $siswa->nama_lengkap }}</td></tr>
                <tr><td class="label">NISN</td><td>: {{ $siswa->nisn }}</td></tr>
                <tr><td class="label">NIK</td><td>: {{ $siswa->nik }}</td></tr>
                <tr><td class="label">Tempat, Tgl Lahir</td><td>: {{ $siswa->tempat_lahir }}, {{ $siswa->tanggal_lahir }}</td></tr>
                <tr><td class="label">Jenis Kelamin</td><td>: {{ $siswa->jenis_kelamin }}</td></tr>
                <tr><td class="label">Agama</td><td>: {{ $siswa->agama }}</td></tr>
                <tr><td class="label">Jurusan</td><td>: {{ $siswa->jurusan }}</td></tr>
                <tr><td class="label">No HP</td><td>: {{ $siswa->no_hp }}</td></tr>
            </table>
        </td>
        <td class="photo">
            @if($siswa->foto)
                <img src="{{ public_path('storage/'.$siswa->foto) }}">
            @endif
        </td>
    </tr>
</table>

<div class="section">
    <div class="section-title">ALAMAT</div>
    {{ $siswa->alamat }},
    {{ $siswa->kecamatan }},
    {{ $siswa->kabupaten }},
    {{ $siswa->provinsi }},
    {{ $siswa->kode_pos }}
</div>

<div class="section">
    <div class="section-title">DATA ORANG TUA</div>
    <table>
        <tr><td class="label">Nama Ayah</td><td>: {{ $siswa->nama_ayah }}</td></tr>
        <tr><td class="label">Nama Ibu</td><td>: {{ $siswa->nama_ibu }}</td></tr>
        <tr><td class="label">HP Ayah</td><td>: {{ $siswa->hp_ayah }}</td></tr>
        <tr><td class="label">HP Ibu</td><td>: {{ $siswa->hp_ibu }}</td></tr>
    </table>
</div>

<div class="section">
    <div class="section-title">SEKOLAH ASAL</div>
    {{ $siswa->nama_sekolah }} ({{ $siswa->jenjang_sekolah }})  
    <br>Status: {{ $siswa->status_sekolah }}
</div>

</body>
</html>
