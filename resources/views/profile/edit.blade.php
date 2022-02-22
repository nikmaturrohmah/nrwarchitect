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
            <h2><p class="text-dark">Edit Data Profile</p></h2>
            <br/>
                <a href="/dataprofile" class="btn btn-warning">Kembali</a>
            <br/>
            @foreach($profile as $o)
            <form action="/profile/update/{{$o->id_profile}}" method="get">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Id profile</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id_profile" required="required" value="{{$o->id_profile}}" disabled="disabled">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama profile</label>
                    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_profile" required="required" value="{{$o->nama_profile}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Umur profile</label>
                    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="umur_profile" required="required" value="{{$o->umur_profile}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Karier</label>
                    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="karier" required="required" value="{{$o->karier}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Domisili</label>
                    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="domisili" required="required" value="{{$o->domisili}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Motto</label>
                    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="motto" required="required" value="{{$o->motto}}">
                </div>
              <button type="submit" class="btn btn-primary">submit</button>
            </form>
            @endforeach
@endsection