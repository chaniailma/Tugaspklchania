@extends('backend.app')

@section('content')
<div class="container">
    <h3 class="fw-bold mb-3">Tambah Nilai</h3>

    <form action="{{ route('nilai.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Mata Pelajaran</label>
            <select name="mapels_id" class="form-control select2" required>
                @foreach($mapel as $m) 
                    <option value="{{ $m->id }}">{{ $m->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Nama student</label>
            <select name="students_id" class="form-control select2" required>
                @foreach($students as $s)
                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Nama guru</label>
            <select name="teachers_id" class="form-control select2" required>
                @foreach($teachers as $t)
                    <option value="{{ $t->id }}">{{ $t->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Nilai</label>
            <input type="number" name="nilai" class="form-control" required min="0" max="100">
        </div>
       
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('nilai') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

@section('script')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2({
                placeholder: "Pilih opsi",
                allowClear: true
            });
        });
    </script>
@endsection
