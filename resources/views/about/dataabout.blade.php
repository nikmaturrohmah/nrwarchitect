@extends('layouts.master')

@section('content')
<main id="main" class="main">

    <!-- <div class="pagetitle">
      <h1>Data about</h1>
    </div>End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data About Arsitek</h5>

              <p><form action="/about/cari" method="GET" >
    <!-- <input type="text" name="cari" placeholder="Cari about .." value="{{ old('cari') }}">
    <input type="submit" value="CARI"> -->
  </form></p>

 <!-- <center><h1>Data about Pegawai</h1></center> -->
    <a href="/about/tambahabout" class="btn btn-success">+ Tambah Data About</a>
    <div class = "table1">
  <table cellspacing='0'>
    <table class="table datatable">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama About</th>
        <th scope="col">Keterangan</th>
        <th scope="col">Opsi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($about as $r)

    <tr>
      <center>
      <td>{{ $loop -> iteration }}</td>
      <!-- <td scope="row">{{ $r->id_about }}</td> -->
      <td>{{ $r->nama_about }}</td>
      <td>{{ $r->keterangan }}</td>
      <td>
        <a href="/about/edit/{{ $r->id_about }}" class="btn btn-info">Edit</a>
        |
        <a href="/about/softdel/{{ $r->id_about }}" class="btn btn-info">Hapus</a>
      </td>
      </center>
    </tr>
    @endforeach
    </tbody>
  </table>
</div>



@endsection
              