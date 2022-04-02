@extends('layouts.master')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit article</h6>
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

                    <form id="form1" action="{{ route('admin.article.update', $article->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Judul</label>
                            <input type="text" name="title" class="form-control" value="{{ $article->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Sub Judul</label>
                            <input type="text" name="sub_title" class="form-control" value="{{ $article->sub_title }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Topik</label>
                            <input type="text" name="topic" class="form-control" value="{{ $article->topic }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Penulis</label>
                            <input type="text" name="author" class="form-control" value="{{ $article->author }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Deskripsi</label>
                            <textarea id="editor" name="description" class="form-control" cols="30" rows="10" >{!! $article->description !!}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Gambar lama</label>
                            <img src="{{ asset('images/'.$article->cover_image) }}" style="width: 100%; height: 300px; object-fit: contain" alt="">
                        </div>
                        <div class="mb-3">
                            <label for="">Gambar Article</label>
                            <div class="dropzone" style="" id="my-dropzone">
                                <input name="file" type="file" hidden />
                            </div>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
@endsection


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script>
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
            url: "{{ route('admin.article.update', $article->id) }}",
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
@endpush