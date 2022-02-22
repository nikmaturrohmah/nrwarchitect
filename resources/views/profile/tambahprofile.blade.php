@extends('layouts.master')

@section('content')
<main id="main" class="main">

    <!-- <div class="pagetitle">
      <h1>Data Tables</h1>
    </div>End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Tambah Data Profile</h5>
            <br/>
                <a href="/dataprofile" class="btn btn-warning">Kembali</a>
            <br/>
            <form action="/profile/simpan" method="get">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">ID profile</label>
                    <input readonly type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id_profile" required="required">
                </div>
                </br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama profile</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_profile" required="required">
                </div>
                </br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Umur profile</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="umur_profile" required="required">
                </div>
                </br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Karier</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="karier" required="required">
                </div>
                </br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Domisili</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="domisili" required="required">
                </div>
                </br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Motto</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="motto" required="required">
                </div>
                </br>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
@endsection