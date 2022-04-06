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
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Sub Judul</label>
                            <input type="text" name="sub_title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Topik</label>
                            <input type="text" name="topic" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Penulis</label>
                            <input type="text" name="author" class="form-control"  required>
                        </div>
                        <div class="mb-3">
                            <label for="">Paragraph</label>
                            <textarea id="editor" class="form-control" name="paragraph" rows="10" cols="50"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Deskripsi</label>
                            <textarea id="editor2" class="form-control" name="description" rows="10" cols="50"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Gambar Article</label>
                            <div class="dropzone" style="" id="my-dropzone">
                                <input name="file" type="file" hidden required />
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

        ClassicEditor
            .create( document.querySelector('#editor2') )
            .then( editor2 => {
                theEditor2 = editor2; // Save for later use.
            } )
            .catch( error => {
                console.error( error );
            } );

        function getDataFromTheEditor2() {
            return theEditor2.getData();
        }

        Dropzone.autoDiscover = false;

        var uploadedDocumentMap = {}
        var myDropzone = new Dropzone(".dropzone", { 
            url: "{{ route('admin.article.store') }}",
            autoProcessQueue: false,
            maxFilesize: 10,
            maxFiles: 1,
            uploadMultiple: false,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            success: function(file, response){
                window.location = "{{ route('admin.article.index') }}";
                //console.log(response);
            },
            init: function() {
                var myDropzone = this;

                document.body.querySelector("button[type=submit]").addEventListener("click", function(e) {
                    document.getElementById("overlay").style.display = "block";
                    //e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });

                this.on("sending", function(data, xhr, formData) {
                    formData.append("_token", $('input[name="_token"]').val());
                    formData.append("file", $('input[name="file"]').val());
                    formData.append("title", $('input[name="title"]').val());
                    formData.append("sub_title", $('input[name="sub_title"]').val());
                    formData.append("topic", $('input[name="topic"]').val());
                    formData.append("author", $('input[name="author"]').val());
                    formData.append("tags", $('input[id="tags"]').val());
                    formData.append("paragraph", getDataFromTheEditor() );
                    formData.append("description", getDataFromTheEditor2() );
                });

                this.on("processing", function() {
                    this.options.autoProcessQueue = true;
                });
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