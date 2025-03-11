@extends('backend.app')

@section('content')

<div class="container" style="overflow-y: auto; max-height: 700px;">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit Data Guru</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#"><i class="icon-home"></i></a>
                </li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#">Tables</a></li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#">Edit Guru</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title">Edit Data Guru</div>
                    <a href="{{ route('teachers') }}" class="btn btn-info btn-sm">Kembali</a>
                </div>

                <div class="card-body" style="overflow-y: auto; max-height: 600px;">
                    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Nama -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                           name="name" value="{{ old('name', $teacher->name) }}" required autofocus>
                                    @error('name')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                           name="email" value="{{ old('email', $teacher->email) }}" required>
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
                                           name="phone" value="{{ old('phone', $teacher->phone) }}">
                                    @error('phone')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Alamat -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" 
                                           name="address" value="{{ old('address', $teacher->address) }}">
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
                                        <option value="male" {{ old('gender', $teacher->gender) == 'male' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="female" {{ old('gender', $teacher->gender) == 'female' ? 'selected' : '' }}>Perempuan</option>
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
                                        <option value="active" {{ old('status', $teacher->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                                        <option value="inactive" {{ old('status', $teacher->status) == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Upload Foto -->
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

                            <!-- Detail Guru -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="detail">Detail</label>
                                    <textarea id="detail" class="form-control @error('detail') is-invalid @enderror" 
                                              name="detail" rows="3">{{ old('detail', $teacher->detail) }}</textarea>
                                    @error('detail')
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
