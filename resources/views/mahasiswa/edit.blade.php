<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Edit Mahasiswa</title>
</head>
<body>
<div class="container pt-4 bg-white">
    <div class="row">
        <div class="col-md-8 col-xl-6">
            <h1>Edit Mahasiswa</h1>
            <hr>
            <form action="{{ route('mahasiswas.update',['mahasiswa'=>$mahasiswa->id]) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ old('nim') ?? $mahasiswa->nim }}">
                    @error('nim')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') ?? $mahasiswa->nama }}">
                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="L" {{ (old('jenis_kelamin') ?? $mahasiswa->jenis_kelamin) == 'L' ? 'checked': '' }} >
                            <label class="form-check-label" for="laki_laki">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P" {{ (old('jenis_kelamin') ?? $mahasiswa->jenis_kelamin) == 'P' ? 'checked': '' }} >
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                        </div>
                        @error('jenis_kelamin')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <select class="form-control" name="jurusan" id="jurusan">
                        <option value="Teknik Informatika" {{ (old('jurusan') ?? $mahasiswa->jurusan)=='Teknik Informatika' ? 'selected': '' }} >Teknik Informatika</option>
                        <option value="Sistem Informasi" {{ (old('jurusan') ?? $mahasiswa->jurusan)=='Sistem Informasi' ? 'selected': '' }} >Sistem Informasi</option>
                        <option value="Ilmu Komputer" {{ (old('jurusan') ?? $mahasiswa->jurusan)=='Ilmu Komputer' ? 'selected': '' }} >Ilmu Komputer</option>
                        <option value="Teknik Komputer" {{ (old('jurusan') ?? $mahasiswa->jurusan)=='Teknik Komputer' ? 'selected': '' }} >Teknik Komputer</option>
                        <option value="Teknik Telekomunikasi" {{(old('jurusan')??$mahasiswa->jurusan)=='Teknik Telekomunikasi'?'selected':''}} >Teknik Telekomunikasi</option>
                    </select>
                    @error('jurusan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control-file @error('foto') is-invalid @enderror" name="foto" id="foto" value="{{old('foto') ?? $mahasiswa->foto }}">
                    @error('foto')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>                
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" rows="3" name="alamat">{{ old('alamat') ?? $mahasiswa->alamat}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Update</button>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
