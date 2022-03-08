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
            <h5 class="card-title">Tambah Data portofolio</h5>
            <br/>
                <a href="/portofolio" class="btn btn-warning">Kembali</a>
            <br/>
            <form action="/portofolio/simpan" method="get">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">ID portofolio</label>
                    <input readonly type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id" required="required">
                </div>
                </br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Portofolio</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" required="required">
                </div>
                </br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Deskripsi</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="description" required="required">
                </div>
                </br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Dimensi Lahan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="dimensi_lahan" required="required">
                </div>
                </br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Luas Lahan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="luas_lahan" required="required">
                </div>
                </br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Luas Bangunan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="luas_bangunan" required="required">
                </div>
                </br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah Lantai</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="jumlah_lantai" required="required">
                </div>
                </br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Kamar Tidur</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="kamar_tidur" required="required">
                </div>
                </br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Kamar Mandi</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="kamar_mandi" required="required">
                </div>
                </br>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
@endsection