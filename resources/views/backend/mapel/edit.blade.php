@extends('backend.app')

@section('content')
<div class="container">
    <h3 class="fw-bold mb-3">Edit Mata Pelajaran</h3>

    <form action="{{ route('mapel.update', $mapel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Mata Pelajaran</label>
            <input type="text" name="nama" class="form-control" value="{{ $mapel->nama }}" required>
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
        <a href="{{ route('mapel') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
