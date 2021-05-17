@extends('layout.layout')
@section('title', 'Admin SIASMADES')

@section('content')
<div class="container mt-3">
  <div class="row">
    <div class="col-12">


    @if(session()->has('pesan'))
      <div class="alert alert-success">
        {{ session()->get('pesan') }}
      </div>
    @endif

    <table class="table table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Jenis Pengajuan</th>
          <th>Tanggal Pengajuan</th>
          <th>Alamat</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      
    </table>
    </div>
  </div>
</div>

@endsection

@section('profile')
<li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
        @foreach ($mahasiswas as $mahasiswa)
            {{ $mahasiswa->nama }}
        </span>
        <img class="img-profile rounded-circle"
            src="{{ url('/img/'.$mahasiswa->foto) }}">
        @endforeach
    </a>
</li>
@endsection