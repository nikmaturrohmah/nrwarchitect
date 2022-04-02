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
                            <div class="dropzone" style="" id="my-dropzone" name="mainFileUploader">
                                <input name="file" type="file" hidden required />
                            </div>
                        <button type="submit" class="btn btn-primary">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script type="text/javascript">
        Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone(".dropzone", { 
            url: "{{ route('admin.landing.aboutus') }}",
            maxFiles: 1,
            autoProcessQueue: false,
            maxFilesize: 20,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            success: function(file, response){
                window.location = "{{ route('admin.landing.aboutus') }}";
                //console.log(response);
            },
            init: function() {
                // Get images
                var myDropzone = this;

                // First change the button to actually tell Dropzone to process the queue.
                document.body.querySelector("button[type=submit]").addEventListener("click", function(e) {
                    document.getElementById("overlay").style.display = "block";
                    //e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });

                this.on("sending", function(data, xhr, formData) {
                    formData.append("_token", $('input[name="_token"]').val());
                    formData.append("landing_about_us_warding_text", $('input[name="landing_about_us_warding_text"]').val());
                    formData.append("landing_about_us_point_1", $('input[name="landing_about_us_point_1"]').val());
                    formData.append("landing_about_us_point_2", $('input[name="landing_about_us_point_2"]').val());
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