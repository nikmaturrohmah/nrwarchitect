@extends('layouts.master')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">About us</h6>
                </div>

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

                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $error }}</strong>
                    </div>
                @endforeach
                
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('admin.landing.aboutus.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Detail</label>
                            <input name="landing_about_us_warding_text" type="text" class="form-control" value="{{ $about[0]->meta_value }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Point 1</label>
                            <input name="landing_about_us_point_1" type="text" class="form-control" value="{{ $about[2]->meta_value }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Point 2</label>
                            <input name="landing_about_us_point_2" type="text" class="form-control" value="{{ $about[3]->meta_value }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Image</label>
                            <img src="{{ asset('images/'.$about[1]->meta_value) }}" style="width: 100%; height: 250px; object-fit: cover" class="rounded mb-2 shadow border-0" alt="">
                            <div class="needsclick dropzone" id="document-dropzone">

                            </div>
                        <button type="submit" class="btn btn-primary mt-3">
                            Simpan
                        </button>
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
                $('form').append('<input type="hidden" name="landing_about_us_image" value="' + response.name + '">');
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

                $('form').find('input[name="landing_about_us_image"][value="' + name + '"]').remove();
                
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