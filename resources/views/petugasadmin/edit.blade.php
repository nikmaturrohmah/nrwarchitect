@extends('layouts.master')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Petugas Admin</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif


                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    @foreach($petugasadmin as $o)
                    <form action="/petugasadmin/update/{{$o->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Nama Petugas Admin</label>
                            <input type="text" name="name" class="form-control" value="{{ $o->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $o->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control" value="{{ $o->password }}">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Kirim
                        </button>
                        <a href="/datapetugasadmin" class="btn btn-warning">Kembali</a>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@endsection