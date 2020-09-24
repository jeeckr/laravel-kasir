@extends('admin.app')

@section('style_css')
<style>
    .invoice-number {
        height: 65px;
        padding-top: 3%;
        /* padding-bottom: 2%; */
    }

    .invoice-title {
        font-size: 13px;
        align-items: flex-end;
    }

    .date {
        text-align: right;
    }

    .card-date {
        width: 70%;
        float: right;
    }

    .card-date-title {
        padding: 5px;
        align-items: center;
        justify-content: center;
        height: 30px;
    }

    .btn-kembali {
        /* float: right; */
    }
</style>
@endsection

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Order</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card bg-success text-white shadow ">
                    <div class="card-body invoice-number">
                        <div class="text-white-55 invoice-title">Invoice</div>
                        <h5>{{ $order->invoice }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-3">
                <div class="date">
                    <div class="mr-2">
                        Tanggal Pembelian
                    </div>
                    <div class="card bg-warning text-white shadow card-date">
                        <div class="card-body card-date-title text-center">
                            <h6>{{ $order->created_at }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>QTY</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    @foreach($detail_order as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->product->name }}</td>
                        <td>{{ $data->qty }}</td>
                        <td>@currency( $data->total_price)</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="btn-kembali mt-3">
                <a href="{{ route('order_admin') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
</div>

@endsection