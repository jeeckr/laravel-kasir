@extends('admin.app')

@section('section_header')
<div class="section-header">
    <h1>Employee</h1>
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
        <h6 class="m-0 font-weight-bold text-primary">Tambah Pegawai</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('employee_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="formGroupExampleInput">Nama</label>
                <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Nama">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Alamat</label>
                <input type="text" name="address" class="form-control" id="formGroupExampleInput2" placeholder="Alamat">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Telepon</label>
                <input type="text" name="phone" class="form-control" id="formGroupExampleInput2" placeholder="Telepon">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Email</label>
                <input type="email" name="email" class="form-control" id="formGroupExampleInput2" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Password</label>
                <input type="password" name="password" class="form-control" id="formGroupExampleInput2" placeholder="Password">
            </div>
            <div class="form-group">
                <a href="{{ route('employee_admin') }}" class="btn btn-warning">Kembali</a>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>

@endsection