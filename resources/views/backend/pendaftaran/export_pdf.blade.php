<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .header {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>PEMERINTAH ACEH</h2>
        <h3>DINAS PENDIDIKAN</h3>
        <h3>SMK NEGERI 1 KUTACANE</h3>
        <p>Jalan Louser No.196 Desa Gumpang Jaya Kecamatan Lawe Bulan</p>
        <p>Kabupaten Aceh Tenggara Provinsi Aceh</p>
    </div>
    <hr>
    <h3 style="text-align: center;">FORMULIR PENDAFTARAN PESERTA DIDIK BARU</h3>
    <h4>IDENTITAS SISWA</h4>
    <table>
        <tr>
            <th>1. Nama Lengkap</th>
            <td>{{ $pendaftaran->nama_lengkap }}</td>
        </tr>
        <tr>
            <th>2. NISN</th>
            <td>{{ $pendaftaran->nisn }}</td>
        </tr>
        <tr>
            <th>3. Tempat Lahir</th>
            <td>{{ $pendaftaran->tempat_lahir }}</td>
        </tr>
        <tr>
            <th>4. Tanggal Lahir</th>
            <td>{{ $pendaftaran->tanggal_lahir }}</td>
        </tr>
        <tr>
            <th>5. Jenis Kelamin</th>
            <td>{{ ucfirst($pendaftaran->jenis_kelamin) }}</td>
        </tr>
        <tr>
            <th>6. Asal Sekolah</th>
            <td>{{ $pendaftaran->asal_sekolah }}</td>
        </tr>
        <tr>
            <th>7. Nomor HP</th>
            <td>{{ $pendaftaran->nomor_hp }}</td>
        </tr>
        <tr>
            <th>8. Nama Ayah</th>
            <td>{{ $pendaftaran->nama_ayah }}</td>
        </tr>
        <tr>
            <th>9. Nama Ibu</th>
            <td>{{ $pendaftaran->nama_ibu }}</td>
        </tr>
        <tr>
            <th>10. Alamat Email</th>
            <td>{{ $pendaftaran->alamat_email }}</td>
        </tr>
    </table>
    <h4>PILIHAN JURUSAN</h4>
    <table>
        <tr>
            <th>1. Jurusan Pertama</th>
            <td>{{ $pendaftaran->jurusan_pertama }}</td>
        </tr>
        <tr>
            <th>2. Jurusan Kedua</th>
            <td>{{ $pendaftaran->jurusan_kedua }}</td>
        </tr>
        <tr>
            <th>3. Jurusan Ketiga</th>
            <td>{{ $pendaftaran->jurusan_ketiga }}</td>
        </tr>
    </table>
    <p>Terima kasih sudah mengisi formulir Pendaftaran Peserta Didik Baru (PPDB) SMK Negeri 1 Kutacane. Silakan cetak dan bawa formulir ini saat wawancara.</p>
    <br>
    <p>Nomor Pendaftaran:</p>
    <p><i>(Diisi Oleh Panitia Pendaftaran)</i></p>
</body>
</html>
