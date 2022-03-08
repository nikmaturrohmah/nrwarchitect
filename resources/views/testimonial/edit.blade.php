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
            <form action="/testimonial/update/{{$o->id}}" method="get" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Id testimonial</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id" required="required" value="{{$o->id}}" disabled="disabled">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" required="required" value="{{$o->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Photo</label>
                    <!-- <img src="{{ asset('/testimoni/'.$o->photo) }}" name="photo" alt="" style="width:320px; height: 240px; text-align: center;" value="{{$o->photo}}" name="photo"> -->
                    <figure><input type="file" id="exampleInputEmail1" aria-describedby="emailHelp" name="photo" required="required" value="{{$o->photo}}"></figure>
                </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Content</label>
                    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="content" required="required" value="{{$o->content}}">
                </div>
                <div class="form-group">
                    <label>Posted</label>
                <select name="posted">
                <option value="{{$o->posted}}">Pilih Posted</option>
                    <option   name="posted" value="{{$o->posted}}">Published</br></option>
                    <option   name="posted"  value="{{$o->posted}}">Drafted</br>
                    </option>
                </select>
                </div>
              <button type="submit" class="btn btn-primary">submit</button>
            </form>
            @endforeach
@endsection