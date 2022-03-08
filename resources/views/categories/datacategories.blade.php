@extends('layouts.master')

@section('content')
<main id="main" class="main">

    <!-- <div class="pagetitle">
      <h1>Data categories</h1>
    </div>End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Categories</h5>

              <p><form action="/categories/cari" method="GET" >
    <!-- <input type="text" name="cari" placeholder="Cari categories .." value="{{ old('cari') }}">
    <input type="submit" value="CARI"> -->
  </form></p>

 <!-- <center><h1>Data categories Pegawai</h1></center> -->
    <a href="/categories/tambahcategories" class="btn btn-success">+ Tambah Data Categories</a>
    <div class = "table1">
  <table cellspacing='0'>
    <table class="table datatable">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Categories</th>
        <th scope="col">Opsi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $r)

    <tr>
      <center>

      <td>{{ $loop -> iteration }}</td>
      <!-- <td scope="row">{{ $r->id_categories }}</td> -->
      <td>{{ $r->name }}</td>
      <td>
        <a href="/categories/edit/{{ $r->id }}" class="btn btn-info">Edit</a>
        <a href="/categories/softdel/{{ $r->id }}" class="btn btn-danger">Hapus</a>
      </td>
      </center>
    </tr>
    @endforeach
    </tbody>
  </table>
</div>



@endsection
              