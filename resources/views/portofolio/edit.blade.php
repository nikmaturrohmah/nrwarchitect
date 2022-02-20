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
            <h2><p class="text-dark">Edit Data Jabatan</p></h2>
            <br/>
                <a href="/datajabatan" class="btn btn-warning">Kembali</a>
            <br/>
            @foreach($jabatan as $o)
            <form action="/jabatan/update/{{$o->id_jabatan}}" method="get">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Id Jabatan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id_jabatan" required="required" value="{{$o->id_jabatan}}" disabled="disabled">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Jabatan</label>
                    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_jabatan" required="required" value="{{$o->nama_jabatan}}">
                </div>
              <button type="submit" class="btn btn-primary">submit</button>
            </form>
            @endforeach
@endsection