@extends('backend.app')

@section('content')
<div class="container-fluid">
    <div class="page-inner">
        <div class="page-header d-flex justify-content-between align-items-center">
            <h3 class="fw-bold">Data Guru</h3>
            <a href="{{ route('teachers.create') }}" class="btn btn-success">Tambah Guru</a>
        </div>
    </div>

    <!-- Form Pencarian -->
    <form method="GET" action="{{ route('teachers') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Nama atau Email..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>

    <div class="card">
        <div class="card-body">

            <!-- Wrapper untuk Scroll -->
           <!-- Wrapper untuk Scroll -->
<div class="table-responsive" style="max-height: 70vh; overflow-y: auto;">
    
                <!-- Tabel Data Guru -->
                <table class="table table-striped table-hover">
                    <thead class="table-success sticky-top" style="position: sticky; top: 0; background-color: white; z-index: 1000;">
                        <tr>
                            <th>No</th>
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
                        @foreach ($teachers as $index => $teacher)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>{{ $teacher->phone }}</td>
                                <td>{{ $teacher->address }}</td>
                                <td>{{ $teacher->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td>{{ $teacher->status == 'active' ? 'Aktif' : 'Tidak Aktif' }}</td>
                                <td>
                                    @if ($teacher->photo)
                                        <img src="{{ url('backend/' . $teacher->photo) }}" width="50" class="rounded">
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
                {{ $teachers->links() }}
            </div> <!-- End Scroll Wrapper -->

        </div> <!-- End Card Body -->
    </div> <!-- End Card -->
</div> 
<!-- End Container -->
@endsection
