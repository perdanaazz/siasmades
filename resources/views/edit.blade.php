@extends('layout.layout')
@section('title', 'SIASMADES')

@section('content')
<div class="container pt-4 bg-white">
    <div class="row">
        <div class="col">
            <h1 class="text-center">EDIT PENGAJUAN</h1>
            <hr>
            <form action="{{ route('mahasiswas.update',['mahasiswa'=>$mahasiswa->id]) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control @error('nama' )is-invalid @enderror" placeholder="Nama Lengkap" value="{{old('nama') ?? $mahasiswa->nama}}" readonly>
                    @error('nama')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" id="nik" class="form-control @error('nik' )is-invalid @enderror" placeholder="NIK" value="{{old('nik') ?? $mahasiswa->nik}}">
                    @error('nik')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control @error('email' )is-invalid @enderror" placeholder="Email" value="{{old('email') ?? $mahasiswa->email}}">
                    @error('email')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="lk" value="L"
                            {{ old('jenis_kelamin') ?? $mahasiswa->jenis_kelamin == 'L' ? 'checked': '' }}>
                            <label class="form-check-label" for="lk">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="pr" value="P"
                            {{ old('jenis_kelamin') ?? $mahasiswa->jenis_kelamin == 'P' ? 'checked': '' }}>
                            <label class="form-check-label" for="pr">Perempuan</label>
                        </div>
                    </div>
                    @error('jenis_kelamin')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="3">{{ old('alamat') ?? $mahasiswa->alamat }}</textarea>
                    @error('alamat')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Pengajuan</label>
                    </div>
                    <select class="custom-select" id="kategori" name="kategori">
                        <option value="Pengajuan Surat Pengantar KTP"
                        {{ old('kategori') ?? $mahasiswa->kategori == 'Pengajuan Surat Pengantar KTP' ? 'selected' : '' }} >Pengajuan Surat Pengantar KTP</option>
                        <option value="Pengajuan Surat Keterangan Penghasilan"
                        {{ old('kategori') ?? $mahasiswa->kategori == "Pengajuan SK Penghasilan" ? 'selected' : '' }} >Pengajuan Surat Keterangan Penghasilan</option>
                        <option value="Pengajuan Surat Keterangan Tidak Mampu"
                        {{ old('kategori') ?? $mahasiswa->kategori == 'Pengajuan SKTM' ? 'selected' : '' }} >Pengajuan Surat Keterangan Tidak Mampu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="foto">Upload KK</label>
                    <input type="file" class="form-control-file @error('foto') is-invalid @enderror" name="foto" id="foto" value="{{old('foto') ?? $mahasiswa->foto}}">
                    @error('foto')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <a class="btn btn-warning mb-2" href="/pengajuan" role="button">Kembali</a>
                <a class="btn btn-danger mb-2 text-white" onclick="javascript:clearForm();" role="button">Hapus Form</a>
                <button type="submit" class="btn btn-primary mb-2 float-right">Kirim</button>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    function clearForm() {
        document.getElementById("nama").value       = "";
        document.getElementById("nik").value        = "";
        document.getElementById("email").value      = "";
        document.getElementById("alamat").value     = "";
        document.getElementById("foto").value       = "";
        document.getElementById("lk").value         = "";
        document.getElementById("pr").value         = "";
        document.getElementById("kategori").value   = "";
	}
</script>
@endsection