@extends('layouts.master')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
            <h2><p class="text-dark">Edit Data Contact</p></h2>
            <br/>
                <a href="/datakontak" class="btn btn-warning">Kembali</a>
            <br/>
            @foreach($kontak as $o)
            <form action="/kontak/update/{{$o->id_kontak}}" method="get">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Id Contact</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id_kontak" required="required" value="{{$o->id_kontak}}" disabled="disabled">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Contact</label>
                    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_kontak" required="required" value="{{$o->nama_kontak}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">No Telepon</label>
                    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="no_tlpn" required="required" value="{{$o->no_tlpn}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required="required" value="{{$o->email}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Fax</label>
                    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fax" required="required" value="{{$o->fax}}">
                </div>
              <button type="submit" class="btn btn-primary">submit</button>
            </form>
            @endforeach
@endsection