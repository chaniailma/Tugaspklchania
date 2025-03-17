@extends('backend.app')

@section('content')
<div class="container">
    <h3 class="fw-bold mb-3">Tambah Nilai</h3>

    <form action="{{ route('nilai.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Mata Pelajaran</label>
            <select name="mapels_id" class="form-control" required>
                @foreach($mapel as $m) 
                    <option value="{{ $m->id }}">{{ $m->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Nama student</label>
            <select name="students_id" class="form-control" required>
                @foreach($students as $s)
                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Nama guru</label>
            <select name="teachers_id" class="form-control" required>
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

