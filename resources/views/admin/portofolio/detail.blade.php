@extends('layouts.master')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Portofolio</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div>
                        Nama
                        <h4>{{ $portofolio->name }}</h4>
                        <br>
                        Deskripsi
                        <h5>{{ $portofolio->description }}</h5>
                        <br>
                        Kategori
                        <h5>{{ $portofolio->category->name }}</h5>
                        <br>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Spesifikasi</h6>
                    @if($portofolio->specificationBuilding != null)
                    <a href="{{ route('admin.portofolio.spesifikasi.edit', $portofolio->id) }}">
                        <button class="btn btn-primary">Edit spesifikasi</button>
                    </a>
                    @elseif($portofolio->specificationInterior != null)
                    <a href="{{ route('admin.portofolio.spesifikasi.edit', $portofolio->id) }}">
                        <button class="btn btn-primary">Edit spesifikasi</button>
                    </a>
                    @endif
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @if($portofolio->portofolio_category_id == 1)
                        @if($portofolio->specificationBuilding == null)
                        <div class="alert alert-danger alert-block">
                            <strong>Data spesifikasi portofolio masih kosong silahkan diisi</strong>
                            <br>
                            <a href="{{ route('admin.portofolio.spesifikasi.create', $portofolio->id) }}">
                                <button class="btn btn-primary btn-sm">isi data</button>
                            </a>
                        </div>
                        @else
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    Lebar lahan (m)
                                    <h4>{{ $portofolio->specificationBuilding->land_width }} m</h4>
                                    <br>
                                    Panjang lahan (m)
                                    <h5>{{ $portofolio->specificationBuilding->land_length }} m</h5>
                                    <br>
                                    Luas lahan (m2)
                                    <h5>{{ ($portofolio->specificationBuilding->land_width*$portofolio->specificationBuilding->land_length) }} m2</h5>
                                    <br>
                                    Lebar bangunan (m)
                                    <h4>{{ $portofolio->specificationBuilding->building_width }} m</h4>
                                    <br>
                                    Panjang bangunan (m)
                                    <h5>{{ $portofolio->specificationBuilding->building_length }} m</h5>
                                    <br>
                                    Luas bangunan (m2)
                                    <h5>{{ ($portofolio->specificationBuilding->building_width*$portofolio->specificationBuilding->building_length) }} m2</h5>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    Lantai
                                    <h4>{{ $portofolio->specificationBuilding->floor }}</h4>
                                    <br>
                                    Kamar tidur
                                    <h5>{{ $portofolio->specificationBuilding->bedroom }}</h5>
                                    <br>
                                    Kamar mandi
                                    <h5>{{ $portofolio->specificationBuilding->bathroom }}</h5>
                                    <br>
                                </div>
                            </div>
                        </div>
                        @endif
                    @else
                        @if($portofolio->specificationInterior == null)
                        <div class="alert alert-danger alert-block">
                            <strong>Data spesifikasi portofolio masih kosong silahkan diisi</strong>
                            <br>
                            <a href="{{ route('admin.portofolio.spesifikasi.create', $portofolio->id) }}">
                                <button class="btn btn-primary btn-sm">isi data</button>
                            </a>
                        </div>
                        @else
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    Tipe
                                    <h4>{{ $portofolio->specificationInterior->type }}</h4>
                                    <br>
                                    Style
                                    <h5>{{ $portofolio->specificationInterior->style }}</h5>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    Panjang ruangan
                                    <h4>{{ $portofolio->specificationInterior->room_length }} m</h4>
                                    <br>
                                    Lebar ruangan
                                    <h5>{{ $portofolio->specificationInterior->room_width }} m</h5>
                                    <br>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Gambar Portofolio</h6>
                    <a href="{{ route('admin.portofolio.image.create', $portofolio->id) }}">
                        <button class="btn btn-primary">Tambah Gambar</button>
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
                        <table class="table table-bordered" id="tableImage" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($portofolio->images as $key=>$value)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        <img src="{{ asset('images/'.$value->image) }}" style="width:50px; height: 50px" alt="">
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.portofolio.image.edit', $value->id) }}"><button class="btn btn-success btn-sm">edit</button></a>
                                        <a href="{{ asset('images/'.$value->image) }}"><button class="btn btn-info btn-sm">lihat</button></a>
                                        <a href="{{ route('admin.portofolio.image.delete', $value->id) }}"><button class="btn btn-danger btn-sm">hapus</button></a>
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
                    <h6 class="m-0 font-weight-bold text-primary">Tags Portofolio</h6>
                    <a href="{{ route('admin.portofolio.tags.create', $portofolio->id) }}">
                        <button class="btn btn-primary">Tambah Tags</button>
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
                        <table class="table table-bordered" id="tableTag" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tags</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($portofolio->tags as $key=>$value)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                    {{ $value->tag}}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.portofolio.tags.edit', $value->id) }}"><button class="btn btn-success btn-sm">edit</button></a>
                                        <a href="{{ asset('tags/'.$value->tags) }}"><button class="btn btn-info btn-sm">lihat</button></a>
                                        <a href="{{ route('admin.portofolio.tags.delete', $value->id) }}"><button class="btn btn-danger btn-sm">hapus</button></a>
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