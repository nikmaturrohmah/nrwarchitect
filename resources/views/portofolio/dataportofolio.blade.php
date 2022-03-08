@extends('layouts.master')

@section('content')
<main id="main" class="main">

    <!-- <div class="pagetitle">
      <h1>Data portofolio</h1>
    </div>End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data portofolio</h5>

              <p><form action="/portofolio/cari" method="GET" >
    <!-- <input type="text" name="cari" placeholder="Cari portofolio .." value="{{ old('cari') }}">
    <input type="submit" value="CARI"> -->
  </form></p>

 <!-- <center><h1>Data portofolio Pegawai</h1></center> -->
    <a href="/portofolio/tambahportofolio" class="btn btn-success">+ Tambah Data portofolio</a>
    <div class = "table1">
  <table cellspacing='0'>
    <table class="table datatable">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Deskripsi</th>
        <th scope="col">Spesifikasi</th>
        <th scope="col">Opsi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($portofolio as $r)

    <tr>
      <center>

      <td>{{ $loop -> iteration }}</td>
      <!-- <td scope="row">{{ $r->id_portofolio }}</td> -->
      <td>
      <div class="row">
                            <div class="col-12">
                                <span class="text">(Judul Desain) {{ $r -> name }}</span> <br>
                                <span class="text">(Description) {{ $r -> description }}</span>
                            </div>
                        </div>
      </td>
      <td>
      <div class="row">
                            <div class="col-12">
                                <span class="text">Dimensi Lahan {{ $r -> dimensi_lahan }},</span> <br>
                                <span class="text">Luas Lahan {{ $r -> luas_lahan }},</span>
                                <span class="text">Luas Bangunan {{ $r -> luas_bangunan }},</span>
                                <span class="text">Jumlah Lantai {{ $r -> jumlah_lantai }},</span>
                                <span class="text">Kamar Tidur {{ $r -> kamar_tidur }},</span>
                                <span class="text">Kamar Mandi {{ $r -> kamar_mandi }}</span>
                            </div>
                        </div>
      </td>
      <td>
        <a href="/portofolio/edit/{{ $r->id }}" class="btn btn-info">Edit</a>
        <a href="/portofolio/softdel/{{ $r->id }}" class="btn btn-danger">Hapus</a>
      </td>
      </center>
    </tr>
    @endforeach
    </tbody>
  </table>
</div>



@endsection
              