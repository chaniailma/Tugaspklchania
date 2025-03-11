@extends('backend.app')

@section('content')

<div class="container">
    <h3>Data Guru</h3>
    <a href="{{ route('teachers.create') }}" class="btn btn-primary mb-3">Tambah Guru</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->phone }}</td>
                    <td>{{ $teacher->address }}</td>
                    <td>{{ $teacher->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td>{{ $teacher->status == 'active' ? 'Aktif' : 'Tidak Aktif' }}</td>
                    <td>
                        @if ($teacher->photo)
                            <img src="{{ url('backend/' .$teacher->photo) }}" width="50">
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-info btn-sm" title="Lihat Detail">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning btn-sm" title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('teachers.delete', $teacher->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
