@extends('backend.app')

@section('content')
<div class="container" style="overflow-y: auto; max-height: 700px;">
    <div class="page-inner">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Edit Nilai</h4>
                <a href="{{ route('teachers') }}" class="btn btn-info btn-sm">Kembali</a>
            </div>

            <div class="card-body" style="overflow-y: auto; max-height: 600px;">
                <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="mapels_id" class="form-label">Mata Pelajaran</label>
                        <select name="mapel_id" id="mapels_id" class="form-control" required>
                            <option value="" disabled>Pilih Mata Pelajaran</option>
                            @foreach($mapel as $m)
                            <option value="{{ $m->id }}" {{ $nilai->mapel_id == $m->id ? 'selected' : '' }}>
                                {{ $m->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="teachers_id" class="form-label">Guru</label>
                        <select name="teacher_id" id="teachers_id" class="form-control" required>
                            <option value="" disabled>Pilih Guru</option>
                            @foreach($teachers as $t)
                            <option value="{{ $t->id }}" {{ $nilai->teacher_id == $t->id ? 'selected' : '' }}>
                                {{ $t->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="students_id" class="form-label">Nama Siswa</label>
                        <select name="student_id" id="students_id" class="form-control" required>
                            <option value="" disabled>Pilih Nama Siswa</option>
                            @foreach($students as $s)
                            <option value="{{ $s->id }}" {{ $nilai->student_id == $s->id ? 'selected' : '' }}>
                                {{ $s->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nilai" class="form-label">Nilai</label>
                        <input type="number" name="score" id="nilai" class="form-control" required min="0" max="100" value="{{ $nilai->score }}">
                    </div>

                    <div class="d-flex">
                        <button type="submit" class="btn btn-success me-2">Update</button>
                        <a href="{{ route('nilai') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection