@extends('layout.layout')
@section('title', 'WELCOME')

@section('content')
<div class="jumbotron" >
    <div class="container">
        <div class="row">
            <div class="col-7">
                <h1 class="display-4">SELAMAT DATANG DI SIASMADES, {{ Auth::user()->name }}</h1>
                <p class="lead">Sistem Informasi Masyarakat Desa untuk menyampaikan aspirasi berupa pengajuan surat pengantar KTP, surat keterangan penghasilan, dan surat keterangan tidak mampu.</p>
                <hr class="my-4">
            </div>
            <div class="col-5 text-center" >
                <p></p>
                <img src="assets/img/Lambang.png" alt="image" height="200" width="398" >
            </div>
        </div>
    </div>
</div>
@endsection

@section ('profile')
<li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="/siasmades" id="userDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
            {{ Auth::user()->name }}
        </span>
    </a>
</li>
@endsection