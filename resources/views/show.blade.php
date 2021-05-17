@extends('layout\layout')
@section('title', 'SIASMADES')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="pt-3 d-flex justify-content-end align-items-center">
                <h1 class="h2 mr-auto">Biodata</h1>
            </div>
            <hr>
            @if(session()->has('pesan'))
                <div class="alert alert-success">
                    {{ session()->get('pesan') }}
                </div>
            @endif
        </div>
        <ul>
            <img class="rounded-circle" width="100px" src="">
            <br><br>
            
            <br>
            <a href="{{url('/')}}" class="btn btn-primary" aria-disabled="true">Kembali</a>
        </ul>
    </div>
</div>
@endsection

@section('profil');

@endsection