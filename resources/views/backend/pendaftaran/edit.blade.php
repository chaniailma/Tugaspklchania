@extends('backend.app')

@section('content')
<div class="container-fluid p-4">
    <div class="col-md-12">
        <div class="card">
            <h3 class="fw-bold mb-3">Edit Pendaftaran</h3>
            
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            
            <form action="{{ route('pendaftaran.update', $pendaftaran->id) }}" method="POST" onsubmit="return redirectAfterSubmit(event)">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" value="{{ $pendaftaran->nama_lengkap }}" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">NISN</label>
                    <input type="text" name="nisn" class="form-control" value="{{ $pendaftaran->nisn }}" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="{{ $pendaftaran->tempat_lahir }}" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ $pendaftaran->tanggal_lahir }}" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        <option value="Laki-laki" {{ $pendaftaran->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ $pendaftaran->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Asal Sekolah</label>
                    <input type="text" name="asal_sekolah" class="form-control" value="{{ $pendaftaran->asal_sekolah }}" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text" name="nomor_hp" class="form-control" value="{{ $pendaftaran->nomor_hp }}" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="Diterima" {{ $pendaftaran->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="Ditolak" {{ $pendaftaran->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('pendaftaran') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<script>
    function redirectAfterSubmit(event) {
        event.preventDefault();
        const form = event.target;
        fetch(form.action, {
            method: form.method,
            body: new FormData(form),
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                  window.location.href = "{{ route('pendaftaran') }}";
              }
          });
    }
</script>
@endsection
