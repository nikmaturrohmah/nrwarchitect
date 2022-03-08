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
            <h5 class="card-title">Tambah Data Petugas Admin</h5>
            <br/>
                <a href="/datapetugasadmin" class="btn btn-warning">Kembali</a>
            <br/>
            <form action="/petugasadmin/simpan" method="get">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Petugas Admin</label>
                    <input readonly type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id" required="required">
                </div>
                </br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Petugas Admin</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" required="required">
                </div>
                </br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required="required">
                </div>
                </br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="password" required="required">
                </div>
                </br>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
@endsection