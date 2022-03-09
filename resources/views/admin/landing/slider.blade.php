@extends('layouts.master')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        @for($i = 0; $i < (sizeof($slider)/3); $i++)
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Slider Landing Page {{ $i+1 }}</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="{{ route('admin.landing.slider.update', $i+1) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="">Title</label>
                                <input name="{{ 'landing_slider_product_'.($i+1).'_title' }}" type="text" class="form-control" value="{{ $slider[($i*3)+0]->meta_value }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="">Image</label>
                                <img src="{{ asset('images/'.$slider[($i*3)+2]->meta_value) }}" style="width: 100%; height: 250px; object-fit: cover" class="rounded mb-2 shadow border-0" alt="">
                                <input name="{{ 'landing_slider_product_'.($i+1).'_image' }}" type="file" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="{{ 'landing_slider_product_'.($i+1).'_warding_text' }}" class="form-control" required id="" cols="30" rows="10">{{ $slider[($i*3)+1]->meta_value }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
@endsection