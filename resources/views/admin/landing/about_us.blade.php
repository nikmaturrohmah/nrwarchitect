@extends('layouts.master')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">About us</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('adminlanding.admin.aboutus.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Detail</label>
                            <input name="landing_about_us_warding_text" type="text" class="form-control" value="{{ $about[0]->meta_value }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Point 1</label>
                            <input name="landing_about_us_point_1" type="text" class="form-control" value="{{ $about[2]->meta_value }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Point 2</label>
                            <input name="landing_about_us_point_2" type="text" class="form-control" value="{{ $about[3]->meta_value }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Image</label>
                            <img src="{{ asset('images/'.$about[1]->meta_value) }}" style="width: 100%; height: 250px; object-fit: cover" class="rounded mb-2 shadow border-0" alt="">
                            <input name="landing_about_us_image" type="file" class="form-control">
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