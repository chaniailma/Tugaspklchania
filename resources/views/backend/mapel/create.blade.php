@extends('backend.app')

@section('content')
<div class="container">
    <h3 class="fw-bold mb-3">Tambah Mata Pelajaran</h3>

    <form action="{{ route('mapel.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Mata Pelajaran</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
       
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('mapel') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
