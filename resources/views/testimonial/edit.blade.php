@extends('layouts.master')

@section('content')
<main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
            <h2><p class="text-dark">Edit Data Testimonial</p></h2>
            <br/>
                <a href="/datatestimonial" class="btn btn-warning">Kembali</a>
            <br/>
            @foreach($testimonial as $o)
            <form action="/testimonial/update/{{$o->id}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Id testimonial</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id" required="required" value="{{$o->id}}" disabled="disabled">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama testimonial</label>
                    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" required="required" value="{{$o->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Foto Testimonial</label>
                    <img src="{{ asset('/testimoni/'.$o->photo) }}" alt="" style="width:320px; height: 240px; text-align: center;">
                    <!-- <figure><input type="file" id="exampleInputEmail1" aria-describedby="emailHelp" name="photo" required="required" value="{{$o->photo}}"></figure> -->
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="content" required="required" value="{{$o->content}}">
                </div>
              <button type="submit" class="btn btn-primary">submit</button>
            </form>
            @endforeach
@endsection