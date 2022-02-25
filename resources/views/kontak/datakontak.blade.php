@extends('layouts.master')

@section('content')
<main id="main" class="main">

    <!-- <div class="pagetitle">
      <h1>Data kontak</h1>
    </div>End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Contact Arsitek</h5>

              <p><form action="/kontak/cari" method="GET" >
    <!-- <input type="text" name="cari" placeholder="Cari kontak .." value="{{ old('cari') }}">
    <input type="submit" value="CARI"> -->
  </form></p>

 <!-- <center><h1>Data kontak Pegawai</h1></center> -->
    <a href="/kontak/tambahkontak" class="btn btn-success">+ Tambah Data kontak</a>
    <div class = "table1">
  <table cellspacing='0'>
    <table class="table datatable">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Contact</th>
        <th scope="col">No Telepon</th>
        <th scope="col">email</th>
        <th scope="col">fax</th>
        <th scope="col">Opsi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($kontak as $r)

    <tr>
      <center>
      <td>{{ $loop -> iteration }}</td>
      <!-- <td scope="row">{{ $r->id_kontak }}</td> -->
      <td>{{ $r->nama_kontak }}</td>
      <td>{{ $r->no_tlpn }}</td>
      <td>{{ $r->email }}</td>
      <td>{{ $r->fax }}</td>
      <td>
        <a href="/kontak/edit/{{ $r->id_kontak }}" class="btn btn-info">Edit</a>
        |
        <a href="/kontak/softdel/{{ $r->id_kontak }}" class="btn btn-info">Hapus</a>
      </td>
      </center>
    </tr>
    @endforeach
    </tbody>
  </table>
</div>



@endsection
              