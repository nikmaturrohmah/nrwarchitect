@extends('layouts.master')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Slider</h6>
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

                    <form action="{{ route('admin.landing.slider.dropzone') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Title</label>
                            <input name="title" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <input name="description" type="text" class="form-control">
                        </div>
                        <div class="dropzone" style="border: none" id="my-dropzone" name="mainFileUploader">
                        </div>
                    </form>
                    <button class="btn btn-primary" type="submit">Submit data and files!</button>
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

        var myDropzone = new Dropzone(".dropzone", { 
            url: "{{ route('admin.landing.slider.store') }}",
            maxFiles: 1,
            autoProcessQueue: false,
            maxFilesize: 5,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            success: function(file, response){
                window.location = "{{ route('admin.landing.slider.index') }}";
                //console.log(response);
            },
            init: function() {
                // Get images
                var myDropzone = this;

                // First change the button to actually tell Dropzone to process the queue.
                document.body.querySelector("button[type=submit]").addEventListener("click", function(e) {
                // Make sure that the form isn't actually being sent.
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });

                this.on("sending", function(data, xhr, formData) {
                    formData.append("_token", $('input[name="_token"]').val());
                    formData.append("title", $('input[name="title"]').val());
                    formData.append("description", $('input[name="description"]').val());
        });
            },
            removedfile: function (file) {
                var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            },
        });

        $('#uploadFile').click(function(){
            myDropzone.processQueue();
        });
    </script>
@endpush