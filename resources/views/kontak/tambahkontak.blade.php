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
            <h5 class="card-title">Tambah Data Contact</h5>
            <br/>
                <a href="/datakontak" class="btn btn-warning">Kembali</a>
            <br/>
            <form action="/kontak/simpan" method="get">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Contact</label>
                    <input readonly type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id_kontak" required="required">
                </div>
                </br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Contact</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_kontak" required="required">
                </div>
                </br>
                <div class="form-group">
                    <label for="exampleInputEmail1">No Telepon</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="no_tlpn" required="required">
                </div>
                </br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required="required">
                </div>
                </br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Fax</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fax" required="required">
                </div>
                </br>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
@endsection