@extends('layouts.master')

@section('content')
<main id="main" class="main">

    <!-- <div class="pagetitle">
      <h1>Data petugasadmin</h1>
    </div>End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Petugas Admin</h5>

              <p><form action="/petugasadmin/cari" method="GET" >
    <!-- <input type="text" name="cari" placeholder="Cari petugasadmin .." value="{{ old('cari') }}">
    <input type="submit" value="CARI"> -->
  </form></p>

 <!-- <center><h1>Data petugasadmin Pegawai</h1></center> -->
    <a href="/petugasadmin/tambahpetugasadmin" class="btn btn-success">+ Tambah Data Petugas Admin</a>
    <div class = "table1">
  <table cellspacing='0'>
    <table class="table datatable">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Petugas Admin</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        <th scope="col">Opsi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($petugasadmin as $r)

    <tr>
      <center>

      <td>{{ $loop -> iteration }}</td>
      <!-- <td scope="row">{{ $r->id_petugasadmin }}</td> -->
      <td>{{ $r->name }}</td>
      <td>{{ $r->email }}</td>
      <td>{{ $r->password }}</td>
      <td>
        <a href="/petugasadmin/edit/{{ $r->id }}" class="btn btn-info">Edit</a>
        |
        <a href="/petugasadmin/softdel/{{ $r->id }}" class="btn btn-info">Hapus</a>
      </td>
      </center>
    </tr>
    @endforeach
    </tbody>
  </table>
</div>



@endsection
              