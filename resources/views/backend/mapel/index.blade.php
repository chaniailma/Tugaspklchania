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
    <h3 class="fw-bold mb-3">Daftar Mata Pelajaran</h3>

    {{-- Tampilkan Notifikasi Jika Berhasil Menghapus --}}
    @if(session('success'))
    <div id="success-message" data-message="{{ session('success') }}"></div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('mapel.create') }}" class="btn btn-success">Tambah Mapel</a>
    </div>

    <div class="table-responsive mt-3">
        <table class="table table-hover w-100" id="mapel">
            <thead class="table-dark">
                <tr>
                    <th class="text-nowrap">No</th>
                    <th class="text-nowrap">Nama</th>
                    <th class="text-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(document).ready(function () {
    $('#mapel').DataTable({
        processing: true,
            serverSide: true,
            ajax: "{{ route('mapel') }}",
            dom: '<"top d-flex justify-content-between mb-3"lf>rt<"bottom"ip><"clear">',
            columns: [
            { 
                data: null, 
                name: 'id', 
                render: function (data, type, row, meta) {
                    return meta.row + 1; // Menampilkan nomor urut
                }
            },
            { data: 'nama', name: 'nama' },
            { 
                data: 'aksi', 
                name: 'aksi', 
                orderable: false, 
                searchable: false 
            }
        ]
    });
});

</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
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

        // Event listener untuk tombol hapus
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function(event) {
                let form = event.target.closest('.delete-form');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data mata pelajaran akan dihapus secara permanen!",
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