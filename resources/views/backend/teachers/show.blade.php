@extends('backend.app')

@section('content')
<div class="container">
    <h3>Detail Guru</h3>
    <a href="{{ route('teachers') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama</th>
                    <td>{{ $teacher->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $teacher->email }}</td>
                </tr>
                <tr>
                    <th>Telepon</th>
                    <td>{{ $teacher->phone }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $teacher->address }}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{ $teacher->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $teacher->status == 'active' ? 'Aktif' : 'Tidak Aktif' }}</td>
                </tr>
                <tr>
                    <th>Detail</th>
                    <td>{{ $teacher->detail }}</td>
                </tr>
                <tr>
                    <th>Foto</th>
                    <td>
                        @if ($teacher->photo)
                            <img src="{{ url('backend/' . $teacher->photo) }}" width="100">
                        @else
                            <p>Tidak ada foto</p>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
