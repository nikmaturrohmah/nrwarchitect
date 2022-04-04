@extends('layouts.master')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Buat Portofolio</h6>
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

                    <form action="{{ route('admin.portofolio.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Nama</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Isi</label>
                            <textarea id="editor" class="form-control" name="description" rows="10" cols="50"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Category</label>
                            <select name="portofolio_category_id" id="selectSpec" class="form-control" required>
                                @foreach($category as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="">
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Panjang lahan (m)</label>
                                        <input type="number" name="land_length" class="form-control spesificationBuilding">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Lebar lahan (m)</label>
                                        <input type="number" name="land_width" class="form-control spesificationBuilding">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Luas lahan (m2)</label>
                                        <input type="number" name="page_area" class="form-control spesificationBuilding">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Panjang bangunan (m)</label>
                                        <input type="number" name="building_length" class="form-control spesificationBuilding">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Lebar bangunan (m)</label>
                                        <input type="number" name="building_width" class="form-control spesificationBuilding">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Luas bangunan (m)</label>
                                        <input type="number" name="building_area" class="form-control spesificationBuilding">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Lantai</label>
                                        <input type="number" name="floor" class="form-control spesificationBuilding">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Kamar tidur</label>
                                        <input type="number" name="bedroom" class="form-control spesificationBuilding">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Kamar mandi</label>
                                        <input type="number" name="bathroom" class="form-control spesificationBuilding">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="">
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Type</label>
                                        <input type="text" name="type" class="form-control spesificationInterior">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Style</label>
                                        <input type="text" name="style" class="form-control spesificationInterior">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Panjang ruangan (m)</label>
                                        <input type="number" name="room_length" class="form-control spesificationInterior">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Lebar ruangan (m)</label>
                                        <input type="number" name="room_width" class="form-control spesificationInterior">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Luas ruangan (m)</label>
                                        <input type="number" name="room_area" class="form-control spesificationInterior">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="">Gambar portofolio</label>
                            <div class="needsclick dropzone" id="document-dropzone">

                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="">Tags</label>
                            <input id=tags name="tags" type="text" required />
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Kirim
                        </button>
                        <a href="{{ route('admin.portofolio.index') }}" class="btn btn-warning">Kembali</a>
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

        $( document ).ready(function() {
            $( ".spesificationBuilding" ).prop( "disabled", false );
            $( ".spesificationInterior" ).prop( "disabled", true );
        });

        $('#selectSpec').change(function(){
            let spec = document.getElementById("selectSpec").value;
            if (spec == 1) {
                $( ".spesificationBuilding" ).prop( "disabled", false );
                $( ".spesificationInterior" ).prop( "disabled", true );
            }

            if (spec == 2) {
                $( ".spesificationBuilding" ).prop( "disabled", true );
                $( ".spesificationInterior" ).prop( "disabled", false );
            }
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script>
        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: "{{ route('admin.dropzone.handler') }}",
            maxFiles: 100,
            maxFilesize: 20,
            addRemoveLinks: true,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="file[]" value="' + response.name + '">');
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

                $('form').find('input[name="file[]"][value="' + name + '"]').remove();
                
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

    <script>
        var input = document.querySelector('input[id=tags]');
        new Tagify(input)
    </script>
@endpush