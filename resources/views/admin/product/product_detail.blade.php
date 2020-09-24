@extends('admin.app')

@section('style_css')
<style>
    .img-product {
        width: 250px;
        height: 250px;
    }

    .stok {
        margin-right: 5px !important;
    }

    .titik-dua {
        padding-left: 20px;
        padding-right: 20px;
    }
</style>
@endsection

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Produk</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <img class="img-thumbnail img-product" alt="image" src="{{ $product->showImage() }}">
            </div>
            <div class="col-md-6">
                <table>
                    <tr>
                        <td>Nama Produk</td>
                        <td class="titik-dua">:</td>
                        <td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td class="titik-dua"> :</td>
                        <td>@currency($product->price) / porsi</td>
                    </tr>
                    <tr>
                        <td class="stok">Stok</td>
                        <td class="titik-dua">:</td>
                        <td>{{ $product->stock }} item</td>
                    </tr>
                </table>
            </div>
        </div>
        <a href="{{ route('product_admin') }}" class="btn btn-warning mt-5">
            <i class="fas fa-arrow-left mr-2"></i><span>Kembali</span>
        </a>
    </div>
</div>

@endsection