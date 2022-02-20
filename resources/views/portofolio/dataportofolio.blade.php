@extends('layouts.master')

@section('content')
<main id="main" class="main">

    <!-- <div class="pagetitle">
      <h1>Data Jabatan</h1>
    </div>End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Jabatan atau jobdecs pegawai</h5>

              <p align = "right"><form action="/jabatan/cari" method="GET" >
    <!-- <input type="text" name="cari" placeholder="Cari jabatan .." value="{{ old('cari') }}">
    <input type="submit" value="CARI"> -->
  </form></p>

 <!-- <center><h1>Data Jabatan Pegawai</h1></center> -->
    <a href="/jabatan/tambahjabatan" class="btn btn-success">+ Tambah Data jabatan</a>
    <div class = "table1">
  <table cellspacing='0'>
    <table class="table datatable">
    <thead>
      <tr>
        <th scope="col">ID Jabatan</th>
        <th scope="col">Nama Jabatan</th>
        <th scope="col">Opsi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($jabatan as $r)

    <tr>
      <center>
      <td scope="row">{{ $r->id_jabatan }}</td>
      <td>{{ $r->nama_jabatan }}</td>
      <td>
        <a href="/jabatan/edit/{{ $r->id_jabatan }}" class="btn btn-info">Edit</a>
        |
        <a href="/jabatan/softdel/{{ $r->id_jabatan }}" class="btn btn-info">Hapus</a>
      </td>
      </center>
    </tr>
    @endforeach
    </tbody>
  </table>
</div>



@endsection
              