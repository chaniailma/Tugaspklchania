@extends('backend.app')

@section('content')
<div class="container-fluid p-4">
    <div class="page-inner">
        <div class="page-header">
            <ul class="breadcrumbs mb-3">
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Basic Tables</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <h3 class="fw-bold mb-3">Data Pendaftaran</h3>

            @if(session('success'))
            <div id="success-message" data-message="{{ session('success') }}"></div>
            @endif

            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('pendaftaran.create') }}" class="btn btn-success">Tambah Pendaftaran</a>
            </div>

            <div class="table-responsive mt-3">
                <table class="table table-hover w-100" id="pendaftaran">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>NISN</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Asal Sekolah</th>
                            <th>No HP</th>
                            <!-- <th>Nama Ayah</th>
                            <th>Nama Ibu</th>
                            <th>Email</th>
                            <th>Jurusan</th>
                            <th>Status</th> -->
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('#pendaftaran').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('pendaftaran') }}",
            dom: '<"top d-flex justify-content-between mb-3"lf>rt<"bottom"ip><"clear">',
            columns: [{
                    data: null,
                    render: (data, type, row, meta) => meta.row + 1
                },
                {
                    data: 'nama_lengkap',
                    name: 'nama_lengkap'
                },
                {
                    data: 'nisn',
                    name: 'nisn'
                },
                {
                    data: 'tempat_lahir',
                    name: 'tempat_lahir'
                },
                {
                    data: 'tanggal_lahir',
                    name: 'tanggal_lahir'
                },
                {
                    data: 'jenis_kelamin',
                    name: 'jenis_kelamin'
                },
                {
                    data: 'asal_sekolah',
                    name: 'asal_sekolah'
                },
                {
                    data: 'nomor_hp',
                    name: 'nomor_hp'
                },
                // { data: 'nama_ayah', name: 'nama_ayah' },
                // { data: 'nama_ibu', name: 'nama_ibu' },
                // { data: 'alamat_email', name: 'alamat_email' },
                // { data: 'jurusan_pertama', name: 'jurusan_pertama' },
                // { data: 'status', name: 'status' },
                {
                    data: 'aksi',
                    name: 'aksi',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        let successMessage = document.getElementById("success-message");
        if (successMessage && successMessage.dataset.message) {
            Swal.fire({
                title: 'Berhasil!',
                text: successMessage.dataset.message,
                icon: 'success',
                confirmButtonText: 'OK'
            });
        }

        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function(event) {
                let form = event.target.closest('.delete-form');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data pendaftaran akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endsection