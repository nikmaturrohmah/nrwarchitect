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
            <h2><p class="text-dark">Edit Data Petugas Admin</p></h2>
            <br/>
                <a href="/datapetugasadmin" class="btn btn-warning">Kembali</a>
            <br/>
            @foreach($petugasadmin as $o)
            <form action="/petugasadmin/update/{{$o->id}}" method="get">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Id petugasadmin</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id" required="required" value="{{$o->id}}" disabled="disabled">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama petugasadmin</label>
                    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" required="required" value="{{$o->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required="required" value="{{$o->email}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="password" required="required" value="{{$o->password}}">
                </div>
              <button type="submit" class="btn btn-primary">submit</button>
            </form>
            @endforeach
@endsection