@extends('layouts.master')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Social Media</h6>
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
                    <form action="{{ route('admin.landing.socialmedia.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Instagram</label>
                            <input name="landing_social_media_instagram" type="text" class="form-control" value="{{ $socialMedia[0]->meta_value }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Facebook</label>
                            <input name="landing_social_media_facebook" type="text" class="form-control" value="{{ $socialMedia[1]->meta_value }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Twitter</label>
                            <input name="landing_social_media_twitter" type="text" class="form-control" value="{{ $socialMedia[2]->meta_value }}" required>
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