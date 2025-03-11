@extends('backend.app')

@section('content')

<div class="container" style="overflow-y: auto; max-height: 700px;">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit Data Siswa</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#"><i class="icon-home"></i></a>
                </li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#">Tables</a></li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#">Edit Siswa</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title">Edit Data Siswa</div>
                    <a href="{{ route('students') }}" class="btn btn-info btn-sm">Kembali</a>
                </div>

                <!-- Tambahkan overflow-auto agar bisa di-scroll -->
                <div class="card-body" style="overflow-y: auto; max-height: 600px;">
                    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Nama -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                           name="name" value="{{ old('name', $student->name) }}" required autofocus>
                                    @error('name')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="photo">Upload Foto:</label>
                                <input type="file" class="form-control @error('photo') is-invalid @enderror" 
                                       name="photo" accept="image/*">
                                @error('photo')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                           name="email" value="{{ old('email', $student->email) }}" required>
                                    @error('email')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <!-- No. Telepon -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">No. Telepon</label>
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" 
                                           name="phone" value="{{ old('phone', $student->phone) }}" required>
                                    @error('phone')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Kelas -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="class">Kelas</label>
                                    <input id="class" type="text" class="form-control @error('class') is-invalid @enderror" 
                                           name="class" value="{{ old('class', $student->class) }}" required>
                                    
                                </div>
                            </div>

                            <!-- Alamat -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <textarea id="address" class="form-control @error('address') is-invalid @enderror" 
                                              name="address" rows="2" required>{{ old('address', $student->address) }}</textarea>
                                    @error('address')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="male" {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="female" {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" required>
                                        <option value="">Pilih Status</option>
                                        <option value="active" {{ old('status', $student->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                                        <option value="inactive" {{ old('status', $student->status) == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection  
