@extends('layouts.master')

@section('content')
<main id="main" class="main">

    <!-- <div class="pagetitle">
      <h1>Data profile</h1>
    </div>End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Profile Arsitek</h5>

              <p><form action="/profile/cari" method="GET" >
    <!-- <input type="text" name="cari" placeholder="Cari profile .." value="{{ old('cari') }}">
    <input type="submit" value="CARI"> -->
  </form></p>

 <!-- <center><h1>Data profile Pegawai</h1></center> -->
    <a href="/profile/tambahprofile" class="btn btn-success">+ Tambah Data profile</a>
    <div class = "table1">
  <table cellspacing='0'>
    <table class="table datatable">
    <thead>
      <tr>
        <th scope="col">ID profile</th>
        <th scope="col">Nama profile</th>
        <th scope="col">Umur profile</th>
        <th scope="col">Karier</th>
        <th scope="col">Domisili</th>
        <th scope="col">motto</th>
        <th scope="col">Opsi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($profile as $r)

    <tr>
      <center>
      <td scope="row">{{ $r->id_profile }}</td>
      <td>{{ $r->nama_profile }}</td>
      <td>{{ $r->umur_profile }}</td>
      <td>{{ $r->karier }}</td>
      <td>{{ $r->domisili }}</td>
      <td>{{ $r->motto }}</td>
      <td>
        <a href="/profile/edit/{{ $r->id_profile }}" class="btn btn-info">Edit</a>
        |
        <a href="/profile/softdel/{{ $r->id_profile }}" class="btn btn-info">Hapus</a>
      </td>
      </center>
    </tr>
    @endforeach
    </tbody>
  </table>
</div>



@endsection
              