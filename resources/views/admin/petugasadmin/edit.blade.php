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
                   
                    <form action="{{ route('admin.admin.update', $petugasadmin->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Nama Petugas Admin</label>
                            <input type="text" name="name" class="form-control" value="{{ $petugasadmin->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $petugasadmin->email }}">
                        </div>
                        <div class="mb-3" hidden>
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" disabled="disabled">
                        </div>
                        <div class="mb-3">
                            <label for="">Update Password</label>
                            <input type="password" name="password" class="form-control" dissable>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Kirim
                        </button>
                        <a href="{{ route('admin.admin.index') }}" class="btn btn-warning">Kembali</a>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>


@endsection