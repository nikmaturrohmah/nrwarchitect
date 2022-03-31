@extends('layouts.master')

@section('content')
<div class="container-fluid mt-3">
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
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detail article</h6>
                    <a href="{{ route('admin.article.edit', $article->id) }}">
                        <button class="btn btn-primary">Edit deskripsi</button>
                    </a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div>
                        Title
                        <h4>{{ $article->slug_title }}</h4>
                        <br>
                        Judul
                        <h4>{{ $article->slug_judul }}</h4>
                        <br>
                        Sub Judul
                        <h4>{{ $article->sub_judul }}</h4>
                        <br>
                        Penulis
                        <h4>{{ $article->penulis }}</h4>
                        <br>
                        Deskripsi
                        <div class="rounded border p-4">
                            {!! $article->description !!}
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Gambar article</h6>
                    <a href="{{ route('admin.article.image.create', $article->id) }}">
                        <button class="btn btn-primary">Tambah Gambar</button>
                    </a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tableImage" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($article->images as $key=>$value)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        <img src="{{ asset('images/'.$value->image) }}" style="width:50px; height: 50px" alt="">
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.article.image.edit', $value->id) }}"><button class="btn btn-success btn-sm">edit</button></a>
                                        <a href="{{ asset('images/'.$value->image) }}"><button class="btn btn-info btn-sm">lihat</button></a>
                                        <a href="{{ route('admin.article.image.delete', $value->id) }}"><button class="btn btn-danger btn-sm">hapus</button></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tags article</h6>
                    <a href="{{ route('admin.article.tags.create', $article->id) }}">
                        <button class="btn btn-primary">Tambah Tags</button>
                    </a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tableTag" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tags</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($article->tags as $key=>$value)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                    {{ $value->tag}}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.article.tags.edit', $value->id) }}"><button class="btn btn-success btn-sm">edit</button></a>
                                        <a href="{{ route('admin.article.tags.delete', $value->id) }}"><button class="btn btn-danger btn-sm">hapus</button></a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script type="text/javascript">
        Dropzone.options.imageUpload = {
            maxFilesize : 2,
            acceptedFiles : ".jpeg,.jpg,.png,.gif"
        };
    </script>

    <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script type="text/javascript">
      $(function () {
        
        var table = $('#tableImage').DataTable({
            processing: true,
            serverSide: false,
        });

        var table1 = $('#tableTag').DataTable({
            processing: true,
            serverSide: false,
        });
        
      });
    </script>
@endpush