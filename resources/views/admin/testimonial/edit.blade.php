@extends('layouts.master')

@section('content')

<style>
  .uploader {
        position:relative; 
        overflow:hidden; 
        width:500px; 
        height:500px;
        background:#f3f3f3; 
        border:2px dashed #e8e8e8;
    }

    #image{
        position:absolute;
        width:500px;
        height:500px;
        top:-50px;
        left:0;
        z-index:2;
        opacity:0;
        cursor:pointer;
    }

    .uploader img{
        position:absolute;
        width:500px;
        height:500px;
        top:-1px;
        left:-1px;
        z-index:1;
        border:none;
    }
</style>

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

                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Nama Pengguna Testimoni</label>
                            <input name="name" type="text" value="{{ $testimonial->name }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Komentar/Testimoni Pengguna </label>
                            <input name="content" type="textarea" value="{{ $testimonial->content }}"  class="form-control" cols="30" rows="10">
                        </div>
                        <div class="mb-3">
                            <label for="">Foto Pengguna Testimoni sekarang</label>
                            <img src="{{ asset('images/'.$testimonial->image) }}" style="width: 100%; height: 250px; object-fit: cover" class="rounded mb-2 shadow border-0" alt="">
                        </div>
                        <div class="mb-3">
                            <label for="">Upload Foto Pengguna Testimoni baru</label>
                            <div class="dropzone mb-3" style="" id="my-dropzone" name="mainFileUploader"></div>
                        </div>
                    </form>
                    <a href="{{ route('admin.testimonial.index') }}" class="btn btn-warning">Kembali</a>
                    <button class="btn btn-primary" type="submit">Submit data and files!</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script type="text/javascript">
        Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone(".dropzone", { 
            url: "{{ route('admin.testimonial.update', $testimonial->id) }}",
            maxFiles: 1,
            autoProcessQueue: false,
            maxFilesize: 5,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            success: function(file, response){
                window.location = "{{ route('admin.testimonial.index') }}";
                //console.log(response);
            },
            init: function() {
                // Get images
                var myDropzone = this;

                // First change the button to actually tell Dropzone to process the queue.
                document.body.querySelector("button[type=submit]").addEventListener("click", function(e) {
                // Make sure that the form isn't actually being sent.
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });

                this.on("sending", function(data, xhr, formData) {
                    formData.append("_token", $('input[name="_token"]').val());
                    formData.append("name", $('input[name="name"]').val());
                    formData.append("content", $('input[name="content"]').val());
        });
            },
            removedfile: function (file) {
                var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            },
        });

        $('#uploadFile').click(function(){
            myDropzone.processQueue();
        });
    </script>
@endpush