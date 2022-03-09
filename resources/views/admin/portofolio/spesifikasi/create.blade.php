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

                    <form action="{{ route('admin.portofolio.spesifikasi.store', $portofolio->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if($portofolio->portofolio_category_id == 1)
                        <div class="mb-3">
                            <label for="">Panjang lahan (m)</label>
                            <input type="number" name="land_length" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Lebar lahan (m)</label>
                            <input type="number" name="land_width" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Panjang bangunan (m)</label>
                            <input type="number" name="building_length" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Lebar bangunan (m)</label>
                            <input type="number" name="building_width" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Lantai</label>
                            <input type="number" name="floor" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Kamar tidur</label>
                            <input type="number" name="bedroom" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Kamar mandi</label>
                            <input type="number" name="bathroom" class="form-control">
                        </div>
                        @else
                        <div class="mb-3">
                            <label for="">Type</label>
                            <input type="text" name="type" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Style</label>
                            <input type="text" name="style" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Ruangan bangunan (m)</label>
                            <input type="number" name="room_length" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Ruangan bangunan (m)</label>
                            <input type="number" name="room_width" class="form-control">
                        </div>
                        @endif
                        <button type="submit" class="btn btn-primary">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script type="text/javascript">
        Dropzone.options.imageUpload = {
            maxFilesize : 2,
            acceptedFiles : ".jpeg,.jpg,.png,.gif"
        };
    </script>
@endpush