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

                    <form action="{{ route('admin.article.update', $article->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Title</label>
                            <input type="text" name="slug_title" class="form-control" value="{{ $article->slug_title }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Judul</label>
                            <input type="text" name="slug_judul" class="form-control" value="{{ $article->slug_judul }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Sub Judul</label>
                            <input type="text" name="sub_judul" class="form-control" value="{{ $article->sub_judul }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Penulis</label>
                            <input type="text" name="penulis" class="form-control" value="{{ $article->penulis }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Deskripsi</label>
                            <textarea id="editor" name="description" class="form-control" cols="30" rows="10" >{!! $article->description !!}</textarea>
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
    </script>
@endpush