@extends('layouts.master')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Logo</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('adminlanding.admin.logo.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Image</label>
                            <img src="{{ asset('images/'.$logo[0]->meta_value) }}" style="width: 100%; height: 250px; object-fit: contain" class="rounded mb-2 shadow border-0" alt="">
                            <input name="landing_logo" type="file" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection