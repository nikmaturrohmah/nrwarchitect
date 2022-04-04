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

                    <form id="form1" action="{{ route('admin.testimonial.update', $testimonial->id) }}" method="post" enctype="multipart/form-data">
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
                            <div class="needsclick dropzone" id="document-dropzone">

                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" form="form1" value="Submit" >Submit data and files!</button>
                        <a href="{{ route('admin.testimonial.index') }}" class="btn btn-warning">Kembali</a>
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
                $('form').append('<input type="hidden" name="image" value="' + response.name + '">');
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

                $('form').find('input[name="image"][value="' + name + '"]').remove();
                
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