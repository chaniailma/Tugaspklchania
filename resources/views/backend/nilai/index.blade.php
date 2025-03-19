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

    <div class="card">
        <div class="card-body">
        <a href="{{ route('nilai.export-pdf') }}" class="btn btn-danger">Export PDF</a>
            <h3 class="fw-bold mb-3">Daftar Nilai</h3>

            {{-- Tampilkan Notifikasi Jika Berhasil Menghapus --}}
            @if(session('success'))
            <div id="success-message" data-message="{{ session('success') }}"></div>
            @endif

            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('nilai.create') }}" class="btn btn-success">Tambah Nilai</a>
            </div>

            <div class="table-responsive mt-3">
                <table class="table table-hover w-100" id="nilai">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-nowrap">No</th>
                            <th class="text-nowrap">Nama Siswa</th>
                            <th class="text-nowrap">Mata Pelajaran</th>
                            <th class="text-nowrap">Nama Guru</th> {{-- Tambahkan Nama Guru --}}
                            <th class="text-nowrap">Nilai</th>
                            <th class="text-nowrap">Aksi</th>
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
  $(document).ready(function () {
    let table = $('#nilai').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('nilai') }}",
        dom: '<"top d-flex justify-content-between mb-3"lf>rt<"bottom"ip><"clear">',
        columns: [
            { 
                data: null, 
                name: 'id', 
                render: function (data, type, row, meta) {
                    return meta.row + 1; // Menampilkan nomor urut
                }
            },
            { data: 'nama_student', name: 'nama_student' }, // Ubah dari siswa ke student
            { data: 'mapel', name: 'mapel' },
            { data: 'nama_guru', name: 'nama_guru' }, // Tambahkan Nama Guru
            { data: 'score', name: 'score' },
            { 
                data: 'aksi', 
                name: 'aksi', 
                orderable: false, 
                searchable: false 
            }
        ]
    });

    // Delegasikan event listener ke document untuk elemen dinamis
    $(document).on('click', '.delete-button', function(event) {
        event.preventDefault(); // Mencegah submit form langsung
        
        let form = $(this).closest('.delete-form'); // Cari form terdekat
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data nilai akan dihapus secara permanen!",
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

    // Notifikasi setelah berhasil menghapus
    let successMessage = document.getElementById("success-message");
    if (successMessage && successMessage.dataset.message) {
        Swal.fire({
            title: 'Berhasil!',
            text: successMessage.dataset.message,
            icon: 'success',
            confirmButtonText: 'OK'
        });
    }
});

</script>
@endsection
