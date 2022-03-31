@extends('layouts.master')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Buat Article</h6>
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

                    <form action="{{ route('admin.article.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Title </label>
                            <input type="text" name="slug_title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Judul </label>
                            <input type="text" name="slug_judul" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Sub Judul</label>
                            <input type="text" name="sub_judul" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Penulis</label>
                            <input type="text" name="penulis" class="form-control"  required>
                        </div>
                        <div class="mb-3">
                            <label for="">Deskripsi</label>
                            <textarea id="editor" class="form-control" name="description" rows="10" cols="50"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Gambar Article</label>
                            <div class="dropzone" style="" id="my-dropzone" name="mainFileUploader">
                                <input name="file" type="file" multiple hidden required />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="">Tags</label>
                            <input id=tags name="tags" type="text" required />
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Kirim
                        </button>
                        <a href="{{ route('admin.article.index') }}" class="btn btn-warning">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-css')
    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
    <script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script>

@endsection

@push('scripts')
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify@3.1.0/dist/tagify.polyfills.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script type="text/javascript">
        let theEditor;

        ClassicEditor
            .create( document.querySelector('#editor') )
            .then( editor => {
                theEditor = editor; // Save for later use.
            } )
            .catch( error => {
                console.error( error );
            } );

        function getDataFromTheEditor() {
            return theEditor.getData();
        }

        Dropzone.autoDiscover = false;

        var uploadedDocumentMap = {}
        var myDropzone = new Dropzone(".dropzone", { 
            url: "{{ route('admin.article.store') }}",
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
                    //console.log(myQuill);
                    //console.log(getDataFromTheEditor());
                });

                this.on("sending", function(data, xhr, formData) {
                    formData.append("_token", $('input[name="_token"]').val());
                    formData.append("file[]", $('input[name="file[]"]').val());
                    formData.append("slug_title", $('input[name="slug_title"]').val());
                    formData.append("slug_judul", $('input[name="slug_judul"]').val());
                    formData.append("sub_judul", $('input[name="sub_judul"]').val());
                    formData.append("penulis", $('input[name="penulis"]').val());
                    formData.append("tags", $('input[id="tags"]').val());
                    formData.append("description", getDataFromTheEditor() );
                });

                this.on("processing", function() {
                    this.options.autoProcessQueue = true;
                });

                this.on("successmultiple", function(files, response) {
                    window.location = "{{ route('admin.article.index') }}";
                })
            },
            removedfile: function (file) {
                var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            },
        });
    </script>

    <script>
        var input = document.querySelector('input[id=tags]');
        new Tagify(input)
    </script>
@endpush