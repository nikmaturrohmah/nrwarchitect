@extends('layouts.master')

@section('content')
<main id="main" class="main">

    <!-- <div class="pagetitle">
      <h1>Data testimonial</h1>
    </div>End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Testimonial</h5>

              <p><form action="/testimonial/cari" method="GET" >
    <!-- <input type="text" name="cari" placeholder="Cari testimonial .." value="{{ old('cari') }}">
    <input type="submit" value="CARI"> -->
  </form></p>

 <!-- <center><h1>Data testimonial Pegawai</h1></center> -->
    <a href="/testimonial/tambahtestimonial" class="btn btn-success">+ Tambah Data testimonial</a>
    <div class = "table1">
  <table cellspacing='0'>
    <table class="table datatable">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col" >Photo</th>
        <th scope="col">Content</th>
        <th scope="col">Posted</th>
        <th scope="col">Opsi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($testimonial as $r)

    <tr>
      <center>

      <td>{{ $loop -> iteration }}</td>
      <!-- <td scope="row">{{ $r->id_testimonial }}</td> -->
      <td>{{ $r->name }}</td>
      <td><figure><img src="{{ asset('/testimoni/'.$r->photo) }}" alt="" style="width:320px; height: 240px; text-align: center;"></figure></td>
      <td>{{ $r->content }}</td>
      <td>{{ $r->posted }}</td>
      <td>
        <a href="/testimonial/edit/{{ $r->id }}" class="btn btn-info">Edit</a>
        <a href="/testimonial/softdel/{{ $r->id }}" class="btn btn-danger">Hapus</a>
      </td>
      </center>
    </tr>
    @endforeach
    </tbody>
  </table>
</div>



@endsection
              