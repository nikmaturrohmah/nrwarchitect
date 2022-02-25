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
            <h2><p class="text-dark">Edit Data About</p></h2>
            <br/>
                <a href="/dataabout" class="btn btn-warning">Kembali</a>
            <br/>
            @foreach($about as $o)
            <form action="/about/update/{{$o->id_about}}" method="get">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Id About</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id_about" required="required" value="{{$o->id_about}}" disabled="disabled">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama About</label>
                    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_about" required="required" value="{{$o->nama_about}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="keterangan" required="required" value="{{$o->keterangan}}">
                </div>
              <button type="submit" class="btn btn-primary">submit</button>
            </form>
            @endforeach
@endsection