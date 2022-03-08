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
            <h5 class="card-title">Tambah Data Testimonial</h5>
            <br/>
                <a href="/datatestimonial" class="btn btn-warning">Kembali</a>
            <br/>
            <form action="/testimonial/simpan"  method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">ID testimonial</label>
                    <input readonly type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id" required="required">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama testimonial</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" required="required">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Foto testimonial</label>
                    <input type="file" name="photo" required="required">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Posted</label>
                <select name="posted">
                <option value="">Pilih Posted</option>
                    <option   value="published">Published</br></option>
                    <option   value="drafted">Drafted</br>
                    </option>
                </div>
                <div class="form-group b">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="content" required="required">
                </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
@endsection