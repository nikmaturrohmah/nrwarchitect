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
                    <h6 class="m-0 font-weight-bold text-primary">Edit Gambar article</h6>
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

                    <form action="{{ route('admin.article.image.update', $image->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Gambar</label>
                            <!-- <img src="{{ asset('images/'.$image->image) }}" style="width: 100%; height: 250px; object-fit: none" class="rounded mb-2 shadow border-0" alt=""> -->
                            <div class="uploader" onclick="$('#image').click()" style="margin-left: 15px">
                                click here or drag here your image for preview and set image data
                                <img src="{{ asset('images/' . $image->image) }}"/>
                                <input type="file" name="image"  id="image" />
                            </div>
                        </div>
                        <button class="btn btn-primary">
                            Kirim
                        </button>
                        <a href="{{ route('admin.article.detail', $article->id) }}" class="btn btn-warning">Kembali</a>
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
    var imageLoader = document.getElementById('image');
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