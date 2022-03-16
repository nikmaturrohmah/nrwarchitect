@extends('layouts.master')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Slider</h6>
                    <a href="{{ route('admin.landing.slider.create') }}">
                        <button class="btn btn-primary">Tambah slider</button>
                    </a>
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
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Gambar</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($slider as $key=>$value)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>
                                        <img src="{{ asset('images/'.$value->image) }}" style="width:50px; height: 50px" alt="">
                                    </td>
                                    <td>
                                        @if($value->posted)
                                        <span class="badge badge-success">Di posting</span>
                                        @else
                                        <span class="badge badge-warning">Di draft</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.landing.slider.edit', $value->id) }}"><button class="btn btn-success btn-sm">Edit</button></a>
                                        <a href="{{ asset('images/'.$value->image) }}"><button class="btn btn-info btn-sm">Lihat</button></a>
                                        @if(!$value->posted)
                                        <a href="{{ route('admin.landing.slider.publish', $value->id) }}"><button class="btn btn-success btn-sm">Post</button></a>
                                        @else
                                        <a href="{{ route('admin.landing.slider.draft', $value->id) }}"><button class="btn btn-warning btn-sm">Draft</button></a>
                                        @endif
                                        <a href="{{ route('admin.landing.slider.delete', $value->id) }}"><button class="btn btn-danger btn-sm">Hapus</button></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <!-- datatables -->
    <!-- <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script> -->

    <!-- Page level plugins -->
    <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script type="text/javascript">
      $(function () {
        
        var table = $('#table').DataTable({
            processing: true,
            serverSide: false,
        });
        
      });
    </script>
@endpush