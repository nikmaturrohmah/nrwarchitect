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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Gambar Portofolio</h6>
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

                    <form action="{{ route('admin.portofolio.image.store', $portofolio->id) }}" class="dropzone" method="post" enctype="multipart/form-data">
                        @csrf
                    </form>
                    <button type="submit" id="uploadFile" class="btn btn-primary mt-3">
                        Kirim
                    </button>
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

        var uploadedDocumentMap = {}
        var myDropzone = new Dropzone(".dropzone", { 
            url: "{{ route('admin.portofolio.image.store', $portofolio->id) }}",
            autoProcessQueue: false,
            maxFilesize: 10,
            uploadMultiple: true,
            parallelUploads: 100,
            maxFiles: 100,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            init: function() {
                var myDropzone = this;

                document.body.querySelector("button[type=submit]").addEventListener("click", function(e) {
                    //e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });

                this.on("sending", function(data, xhr, formData) {
                    formData.append("_token", $('input[name="_token"]').val());
                    formData.append("file[]", $('input[name="file[]"]').val());
                });

                this.on("processing", function() {
                    this.options.autoProcessQueue = true;
                });

                this.on("successmultiple", function(files, response) {
                    window.location = "{{ route('admin.portofolio.detail', $portofolio->id) }}";
                    //console.log(response);
                })
            },
            removedfile: function (file) {
                var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            },
        });
    </script>
@endpush