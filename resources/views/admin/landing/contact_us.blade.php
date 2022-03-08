@extends('layouts.master')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Contact us</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('adminlanding.admin.contactus.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Address</label>
                            <input name="landing_contact_map" type="text" class="form-control" value="{{ $contact[0]->meta_value }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input name="landing_contact_phone" type="text" class="form-control" value="{{ $contact[1]->meta_value }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input name="landing_contact_email" type="text" class="form-control" value="{{ $contact[2]->meta_value }}" required>
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