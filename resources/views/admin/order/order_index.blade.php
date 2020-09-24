@extends('admin.app')

@section('style_css')

@endsection

@section('content')
<div class="row">

</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Order</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Invoice</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $no = 1 ?>

                    @foreach($orders as $data)
                    <tr>
                        <td class="text-center">
                            {{ $no++ }}
                        </td>
                        <td>{{ $data->invoice }}</td>
                        <td class="align-middle">{{ $data->total }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td><a href="{{ route('order_detail', $data->id) }}" class="btn btn-secondary">Detail</a></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection