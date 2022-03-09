@extends('layouts.master')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Buat Testimonial</h6>
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

                    <form action="{{ route('admin.testimonial.update', $testimonial->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ $testimonial->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Isi</label>
                            <textarea name="content" class="form-control" cols="30" rows="10">{{ $testimonial->name }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Photo</label>
                            <img src="{{ asset('images/'.$testimonial->photo) }}" style="width: 100%; height: 250px; object-fit: none" class="rounded mb-2 shadow border-0" alt="">
                            <input name="photo" type="file" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Kirim
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script type="text/javascript">
        Dropzone.options.imageUpload = {
            maxFilesize : 2,
            acceptedFiles : ".jpeg,.jpg,.png,.gif"
        };
    </script>
@endpush