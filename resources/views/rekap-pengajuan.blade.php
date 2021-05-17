@extends('layout.layout')
@section('title', 'SIASMADES')

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
        <tr class="text-center">
          <th>No</th>
          <th>Nama</th>
          <th>Jenis Pengajuan</th>
          <th>Tanggal Pengajuan</th>
          <th>Alamat</th>
          <!-- <th>Status</th> -->
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($mahasiswas as $mahasiswa)
        <tr>
          <td>
              {{$mahasiswa->id}}
          </td>
          <td>
              {{$mahasiswa->nama}}
          </td>
          <td>
              {{$mahasiswa->kategori}}
          </td>
          <td>
              {{$mahasiswa->created_at}}
          </td>
          <td>
              {{$mahasiswa->alamat}}
          </td>
          <td class="form-check form-check-inline">
              <a href="{{ route('mahasiswas.edit',['mahasiswa'=>$mahasiswa->id]) }}" class="btn btn-warning">Edit</a>
              <a href="{{ route('mahasiswas.show',['mahasiswa'=>$mahasiswa->id]) }}" class="btn btn-success">Detail</a>
              <form action="{{ route('mahasiswas.destroy',['mahasiswa'=>$mahasiswa->id]) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Hapus</button>
              </form>
          </td>
      <tr>
      @empty
      @endforelse
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
        @foreach ($users as $user)
            {{ $user->name }}
        </span>
        <img class="img-profile rounded-circle"
            src="{{ url('/img/avatar/'.$user->foto) }}">
        @endforeach
    </a>
</li>
@endsection