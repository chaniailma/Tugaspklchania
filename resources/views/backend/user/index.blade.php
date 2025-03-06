@extends('backend.app')
@section('content')
<div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Tables</h3>
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="#">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Tables</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Basic Tables</a>
                </li>
              </ul>
            </div>
            <div class="row">

            <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">ini halaman user </div>
                  </div>
                  <div class="card-body">
                    <table class="table table-head-bg-danger tabel hover">
                      <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($users as $index => $user)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
        </tr>
        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

    <table border="0">
        
    </table>
          </div>
</div>
</div>
@endsection
