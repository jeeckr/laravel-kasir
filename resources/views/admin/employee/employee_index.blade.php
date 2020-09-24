@extends('admin.app')

@section('style_css')

@endsection

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('employee_create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-3"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Pegawai</a>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $no = 1 ?>

                    @foreach($employee as $data)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>{{ $data->name }}</td>
                        <td class="text-center">{{ $data->phone }}</td>
                        <td>{{ $data->address }}</td>
                        <td class="text-center">{{ $data->email }}</td>
                        <td>
                            <div class="row text-center">
                                <div class="col">
                                    <a href="{{ route('employee_edit', $data->id) }}" class="btn btn-warning btn-edit"><i class="fa fa-edit" aria-hidden="true"></i>
                                    </a></div>
                                <div class="col">
                                    <a href="{{ route('employee_destroy', $data->id) }}" class="btn btn-danger btn-hapus"><i class="fa fa-trash" aria-hidden="true"></i>
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