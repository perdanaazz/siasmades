<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Biodata {{$mahasiswa->nama}}</title>
</head>
<body>
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="pt-3 d-flex justify-content-end align-items-center">
                <h1 class="h2 mr-auto">Biodata {{$mahasiswa->nama}}</h1>
                <a href="{{ route('mahasiswas.edit',['mahasiswa'=>$mahasiswa->id]) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('mahasiswas.destroy',['mahasiswa'=>$mahasiswa->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-3">Hapus</button>
                </form>
            </div>
            <hr>
            @if(session()->has('pesan'))
                <div class="alert alert-success">
                    {{ session()->get('pesan') }}
                </div>
            @endif
        </div>
        <ul>
            <img class="rounded-circle" width="100px" src="{{ url('/img/'.$mahasiswa->foto) }}">
            <br><br>
            <li>NIM: {{$mahasiswa->nim}} </li>
            <li>Nama: {{$mahasiswa->nama}} </li>
            <li>Jenis Kelamin: {{$mahasiswa->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-laki'}}</li>
            <li>Jurusan: {{$mahasiswa->jurusan}} </li>
            <li>Alamat: {{$mahasiswa->alamat == '' ? 'N/A' : $mahasiswa->alamat}}</li>
            <br>
            <a href="{{ route('mahasiswas.index') }}" class="btn btn-primary" aria-disabled="true">Kembali</a>
        </ul>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
