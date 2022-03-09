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
                            <!-- <img src="{{ asset('images/'.$testimonial->photo) }}" style="width: 100%; height: 250px; object-fit: none" class="rounded mb-2 shadow border-0" alt=""> -->
                            <div class="uploader" onclick="$('#photo').click()" style="margin-left: 15px">
                                click here or drag here your photo for preview and set photo data
                                <img src="{{ asset('images/' . $testimonial->photo) }}"/>
                                <input type="file" name="photo"  id="photo" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Kirim
                        </button>
                        <a href="{{ route('admin.testimonial.index') }}" class="btn btn-warning">Kembali</a>
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
    <script>
    var imageLoader = document.getElementById('photo');
    imageLoader.addEventListener('change', handleImage, false);

    function handleImage(e) {
        var reader = new FileReader();
        reader.onload = function (event) {
            $('.uploader img').attr('src',event.target.result);
        }
        reader.readAsDataURL(e.target.files[0]);
    }
</script>
@endpush