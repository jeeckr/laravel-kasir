@extends('admin.app')

@section('style_css')
<style>

</style>
@endsection

@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    Mohon isi data yang masih kosong!
</div>
@endif

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Produk</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('product_update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="formGroupExampleInput">Nama Produk</label>
                <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Nama Produk" value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Stok</label>
                <input type="text" name="stock" class="form-control" id="formGroupExampleInput2" placeholder="Stok" value="{{ $product->stock }}">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Harga</label>
                <input type="text" name="price" class="form-control" id="price" id="formGroupExampleInput2" placeholder="Harga" value="{{ $product->price }}">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Gambar</label>
                <input type="file" name="image" class="form-control" id="formGroupExampleInput2">
            </div>
            <div class="form-group">
                <label for="disabledSelect">Kategori</label>
                <select class="form-control" name="category_id">
                    <option>-- pilih kategori --</option>
                    <option value="1">Makanan</option>
                    <option value="2">Minuman</option>
                </select>
            </div>
            <div class="form-group">
                <a href="{{ route('product_admin') }}" class="btn btn-warning"> <i class="fas fa-arrow-left mr-2"></i><span>Kembali</span></a>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection