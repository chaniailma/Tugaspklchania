@extends('backend.app')

@section('content')
<div class="container-fluid">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Detail Pendaftaran</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tables</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Detail Pendaftaran</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="col-md-8 mx-auto">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Informasi Siswa</h4>
            <a href="{{ route('pendaftaran') }}" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <th>Nama Lengkap</th>
                    <td>{{ $pendaftaran->nama_lengkap }}</td>
                </tr>
                <tr>
                    <th>NISN</th>
                    <td>{{ $pendaftaran->nisn }}</td>
                </tr>
                <tr>
                    <th>Tempat Lahir</th>
                    <td>{{ $pendaftaran->tempat_lahir }}</td>
                </tr>
                <tr>
                    
                    <th>Tanggal Lahir</th>
                    <td>{{ $pendaftaran->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ ucfirst($pendaftaran->jenis_kelamin) }}</td>
                </tr>
                <tr>
                    <th>Asal Sekolah</th>
                    <td>{{ $pendaftaran->asal_sekolah }}</td>
                </tr>
                <tr>
                    <th>Nomor HP</th>
                    <td>{{ $pendaftaran->nomor_hp }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $pendaftaran->alamat_email }}</td>
                </tr>
                <tr>
                    <th>Nama Ayah</th>
                    <td>{{ $pendaftaran->nama_ayah }}</td>
                </tr>
                <tr>
                    <th>Nama Ibu</th>
                    <td>{{ $pendaftaran->nama_ibu }}</td>
                </tr>
                <tr>
                    <th>Jurusan</th>
                    <td>{{ $pendaftaran->jurusan_pertama }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ ucfirst($pendaftaran->status) }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
