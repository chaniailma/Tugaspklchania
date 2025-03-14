@extends('backend.app')

@section('content')
<div class="container-fluid">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Detail Siswa</h3>
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
                    <a href="#">Detail Siswa</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="col-md-8 mx-auto">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Informasi Siswa</h4>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            <div class="text-center mb-4">
                @if($student->photo)
                    <img src="{{ url('backend/' . $student->photo) }}" class="rounded-circle" width="150">
                @else
                    <p>Tidak ada foto</p>
                @endif
            </div>
            <table class="table table-striped">
                <tr>
                    <th>Nama</th>
                    <td>{{ $student->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $student->email }}</td>
                </tr>
                <tr>
                    <th>Telepon</th>
                    <td>{{ $student->phone }}</td>
                </tr>
                <tr>
                    <th>Kelas</th>
                    <td>{{ $student->class }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $student->address }}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{ ucfirst($student->gender) }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ ucfirst($student->status) }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
