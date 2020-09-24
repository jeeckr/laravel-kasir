@extends('admin.app')

@section('section_header')
<div class="section-header">
    <h1>Product</h1>
</div>
@endsection

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    Mohon isi data yang masih kosong!
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Produk</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('product_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="formGroupExampleInput">Nama Produk</label>
                <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Nama Produk">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Stok</label>
                <input type="text" name="stock" class="form-control" id="formGroupExampleInput2" placeholder="Stok">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Harga</label>
                <input type="text" name="price" class="form-control" id="price" id="formGroupExampleInput2" placeholder="Harga">
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
                <a href="{{ route('product_admin') }}" class="btn btn-warning">Kembali</a>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>
<!-- 
<script type="text/javascript">
    var dengan_rupiah = document.getElementById('price');
    dengan_rupiah.addEventListener('keyup', function(e) {
        dengan_rupiah.value = formatRupiah(this.value, ' ');
        // dengan_rupiah.value = formatRupiah(this.value);
    });

    /* Fungsi */
    function formatRupiah(angka) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        return rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : '';
    }
</script> -->
@endsection