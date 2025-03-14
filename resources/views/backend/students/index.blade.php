@extends('backend.app')

@section('content')

<div class="container-fluid">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Tables</h3>
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
                    <a href="#">Basic Tables</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="card-title">Data Siswa</div>
                <a href="{{ route('students.create') }}" class="btn btn-success">Tambah</a>
            </div>
        </div>
        <form method="GET" action="{{ route('students') }}" class="mt-3">
    <div class="input-group">
        <input type="search" name="search" class="form-control" placeholder="Cari Nama atau Email..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Cari</button>
    </div>
</form>

        <!-- Tambahkan div agar tabel bisa discroll -->
        <div class="card-body">
        <div class= "table-responsive" style="max-height: 70vh; overflow-y: auto;">
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
            <table class="table table-head-bg-success table-hover">
                <thead class="sticky-top bg-white">
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $key => $student)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            @if($student->photo)
                                <img src="{{ url('backend/' . $student->photo) }}" width="50" class="rounded">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->class }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ ucfirst($student->gender) }}</td>
                        <td>{{ ucfirst($student->status) }}</td>
                        <td>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form id="delete-form-{{ $student->id }}" action="{{ route('students.delete', $student->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $student->id }}')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $students->links() }}
        </div> <!-- End Scrollable Card Body -->
    </div>
</div>

@endsection

@section('script')
<script>
    function confirmDelete(studentId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data siswa akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + studentId).submit();
            }
        })
    }
</script>

@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif
@endsection
