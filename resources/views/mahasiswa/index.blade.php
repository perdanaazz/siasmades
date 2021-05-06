<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <title>Data Mahasiswa</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light mt-2" style="background-color: #f0072a;">
    <div class="container-fluid m-3">
        <a class="navbar-brand text-white" href="{{ route('welcome') }}">UMKM PANIK || PANIK.COM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav float-end">
            <li class="nav-item">
            <a class="nav-link text-white" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white" href="#">Katalog</a>
            </li>
            <li class="nav-item">
            <!-- <a class="nav-link text-white" href="{{ route('mahasiswas.create') }}">Tambah data</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('mahasiswas.create') }}">Hapus data</a>
            </li> -->
            <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link text-white">Logout</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container mt-2">

    <div class="row">
        <div class="col-2">
            <div class="btn-group-vertical">
                <a type="a" class="btn btn-danger" href="{{ route('mahasiswas.create') }}">Tambah data</a>
                <a type="a" class="btn btn-danger" href="/mahasiswas-delete">Hapus data</a>
                <a type="a" class="btn btn-danger" href="/sortbynama">Sort by nama</a>
                <a type="a" class="btn btn-danger" href="/sortbyharga">Sort by harga</a>
            </div>
        </div>
        <div class="col-8">
        @forelse ($mahasiswas as $mahasiswa)
            <div class="card d-inline-block mb-5" style="width: 12rem; height: 22rem">
                <img src="{{ url('/img/'.$mahasiswa->foto) }}" class="card-img-top" widht="150px" height="150px">
                <div class="card-body">
                    <h6 class="card-title">{{$mahasiswa->nama}}</h6>
                </div>
                <ul class="list-group list-group-flush">
                    <!-- <li class="list-group-item">{{$mahasiswa->jenis_kelamin == 'P'?'Perempuan' : 'Laki-laki'}}</li> -->
                    <li class="list-group-item">{{$mahasiswa->harga}}</li>
                    <!-- <li class="list-group-item">{{$mahasiswa->alamat == '' ? 'N/A' : $mahasiswa->alamat}}</li> -->
                </ul>
                <a href="{{ route('mahasiswas.edit',['mahasiswa'=>$mahasiswa->id]) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('mahasiswas.destroy',['mahasiswa'=>$mahasiswa->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        @empty
        @endforelse
        </div>
    </div>
</div>
</div>
<footer class="p-3 mt-1 mb-2" style="background-color: #f0072a;">
    <p class="text-center text-white">Copyright panik.com | 2021</p>
</footer>
<!-- <div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="py-4 d-flex justify-content-end align-items-center">
                <h2 class="mr-auto">Tabel Mahasiswa</h2>
                <a href="{{route('mahasiswas.create')}}" class="btn btn-primary mr-2">Tambah Mahasiswa</a>
                <a type="a" class="btn btn-primary mr-2" href="/mahasiswas-sortbynim">Sort by NIM</a>
                <a type="a" class="btn btn-primary" href="/mahasiswas-sortbyname">Sort by Name</a>
                <a href="{{ route('logout') }}" class="form-inline my-2 ml-2 btn btn-danger">Logout</a>
            </div>
            @if(session()->has('pesan'))
                <div class="alert alert-success">
                    {{ session()->get('pesan') }}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Jurusan</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mahasiswas as $mahasiswa)
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <td><a href="{{url('/mahasiswas/'.$mahasiswa->id)}}">{{$mahasiswa->nim}}</td>
                        <td>{{$mahasiswa->nama}}</td>
                        <td>{{$mahasiswa->jenis_kelamin == 'P'?'Perempuan':'Laki-laki'}}</td>
                        <td>{{$mahasiswa->jurusan}}</td>
                        <td>{{$mahasiswa->alamat == '' ? 'N/A' : $mahasiswa->alamat}}</td>
                    </tr>
                    <div class="card d-inline-block m-4" style="width: 18rem;">
                        <img src="{{ url('/img/'.$mahasiswa->foto) }}" class="card-img-top" widht="150px">
                        <div class="card-body">
                            <h5 class="card-title">{{$mahasiswa->nama}}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$mahasiswa->jenis_kelamin == 'P'?'Perempuan' : 'Laki-laki'}}</li>
                            <li class="list-group-item">{{$mahasiswa->jurusan}}</li>
                            <li class="list-group-item">{{$mahasiswa->alamat == '' ? 'N/A' : $mahasiswa->alamat}}</li>
                        </ul>
                    </div>
                    @empty
                        <td colspan="6" class="text-center">Tidak ada data...</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
