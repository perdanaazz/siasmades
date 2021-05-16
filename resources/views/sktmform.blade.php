@extends('layout.member')
@section('title', 'Member SIASMADES')

@section('content')
<div class="container pt-4 bg-white">
    <div class="row">
        <div class="col">
            <h1>FORM PENGAJUAN Surat Keterangan Tidak Mampu (SKTM)</h1>
            <hr>
            <form action="{{url('/form')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control @error('nama' )is-invalid @enderror" placeholder="Nama Lengkap"  value="{{old('nama')}}">
                    @error('nama')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" id="nik" class="form-control @error('nik' )is-invalid @enderror" placeholder="NIK"  value="{{old('nik')}}">
                    @error('nik')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control @error('email' )is-invalid @enderror" placeholder="Email"  value="{{old('email')}}">
                    @error('email')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="lk" value="L" {{old('jenis_kelamin')=='L'?'checked':''}}>
                            <label class="form-check-label" for="lk">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="pr" value="P" {{old('jenis_kelamin')=='P'?'checked':''}}>
                            <label class="form-check-label" for="pr">Perempuan</label>
                        </div>
                    </div>
                    @error('jenis_kelamin')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="3">{{old('alamat')}}</textarea>
                    @error('alamat')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal_upload">Tanggal upload</label>
                    <input type="text" name="tanggal_upload" id="tanggal_upload" class="form-control @error('tanggal_upload' )is-invalid @enderror" value="{{old('tanggal_upload')}}">
                    @error('tanggal_upload')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori Pengajuan</label>
                    <input type="text" name="kategori" id="kategori" class="form-control @error('kategori' )is-invalid @enderror" value="Pengajuan SKTM" readonly>
                </div>
                <div class="form-group">
                    <label for="kk">Upload KK</label>
                    <input type="file" class="form-control-file @error('kk') is-invalid @enderror" name="kk" id="kk" value="{{old('kk')}}">
                    @error('kk')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sk">Upload SK Penghasilan</label>
                    <input type="file" class="form-control-file @error('sk') is-invalid @enderror" name="sk" id="sk" value="{{old('sk')}}">
                    @error('sk')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <a class="btn btn-primary mb-2" href="{{url('/')}}" role="button">Back</a>
                <button type="submit" class="btn btn-primary mb-2 float-right">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection