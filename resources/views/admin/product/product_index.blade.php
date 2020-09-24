@extends('admin.app')

@section('style_css')
<style>
    .img-product {
        width: 150px;
        height: 150px;
    }

    .btn-edit {
        color: white !important;
    }

    .btn-hapus {
        color: white;
    }
</style>
@endsection

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-s font-weight-bold text-primary text-uppercase mb-1">Semua Produk</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">{{ count($product) }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-s font-weight-bold text-warning text-uppercase mb-1">Makanan</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">{{ count($food) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-drumstick-bite fa-3x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-s font-weight-bold text-success text-uppercase mb-1">Minuman</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">{{ count($drink) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-wine-glass-alt fa-3x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DATA PRODUK</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('product_create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-3"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Produk</a>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $no = 1 ?>

                    @foreach($product as $data)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>{{ $data->name }}</td>
                        <td class="text-center">{{ $data->stock }}</td>
                        <td>@currency($data->price)</td>
                        <td>{{ $data->category_name }}</td>
                        <!-- <td>
                            <img class="img-thumbnail img-product" alt="image" src="{{ $data->showImage() }}">
                        </td> -->
                        <td>
                            <div class="row text-center">
                                <div class="col">
                                    <a href="{{ route('product_show', $data->id) }}" class="btn btn-secondary btn-detail"><i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href=" {{ route('product_edit', $data->id) }} " class="btn btn-warning btn-edit"><i class="fa fa-edit" aria-hidden="true"></i>
                                    </a></div>
                                <div class="col">
                                    <a href="{{ route('product_destroy', $data->id) }}" class="btn btn-danger btn-hapus"><i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection