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
                    <h6 class="m-0 font-weight-bold text-primary">Edit Gambar Portofolio</h6>
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

                    <form action="{{ route('admin.portofolio.image.update', $image->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Gambar</label>
                            <img src="{{ asset('images/'.$image->image) }}" style="width: 100%; height: 100%; object-fit: none" class="rounded mb-2 shadow border-0" alt="">
                            <div class="needsclick dropzone" id="document-dropzone">

                            </div>
                        </div>
                        <button class="btn btn-primary">
                            Kirim
                        </button>
                        <a href="{{ route('admin.portofolio.detail', $portofolio->id) }}" class="btn btn-warning">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script>
        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: "{{ route('admin.dropzone.handler') }}",
            maxFiles: 1,
            maxFilesize: 20,
            addRemoveLinks: true,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="file" value="' + response.name + '">');
                uploadedDocumentMap[file.name] = response.name;
                console.log(response);
            },
            removedfile: function(file) {
                file.previewElement.remove();
                var name = '';
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name;
                } else {
                    name = uploadedDocumentMap[file.name];
                }

                $('form').find('input[name="file"][value="' + name + '"]').remove();
                
                $.post("{{ route('admin.dropzone.handler') }}", {
                    '_token': "{{ csrf_token() }}",
                    'actionDz': "remove",
                    'name': name
                },
                function(data, status){
                    console.log(data);
                });
            }
        }
    </script>
@endpush