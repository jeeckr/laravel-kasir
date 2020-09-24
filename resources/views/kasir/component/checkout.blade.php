<style>
    .body-checkout {
        padding: 0;
        background-color: white;
    }

    .row-title {
        margin: 0;
        height: 8%;
        font-size: 15px;
        align-items: center;
        /* background-color: rgba(0, 0, 0, 0.125); */
    }

    .btn-checkout {
        width: 100% !important;
    }

    .card-header-checkout {
        background-color: white;
        height: 11%;
        border: none;
    }

    .card-checkout {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
</style>


<form action="{{ route('order') }}" method="POST">
    @csrf
    <div class="card bg-light mb-3 card-checkout ">
        <div class="card-header text-center card-header-checkout">
            <h5><b>Checkout</b></h5>
        </div>
        <div class="card-body body-checkout">
            <div class="row row-title bg-light text-center">
                <div class="col">Nama</div>
                <div class="col">QTY</div>
                <div class="col">Harga</div>
            </div>
            <div id="data-product">

                @include('kasir.component.list_checkout')

            </div>
        </div>
        <div class="card-footer">
            <div class="row footer-checkout">
                <div class="total mr-auto">TOTAL</div>
                <div class="total ml-auto">555</div>
            </div>
        </div>
    </div>

    <input type="hidden" name="invoice" id="invoice" value="1234">
    <input type="hidden" name="id_employee" id="id_employee" value="{{$employee->id}}">
    <input type="hidden" name="total" id="total" value="5555">

    <input type="button" name="btn" value="Submit" id="submitBtn" data-toggle="modal" data-target="#exampleModal" class="btn btn-default" />

    <!-- 
    <button type="submit" class="btn btn-primary btn-checkout" data-toggle="modal" data-target="#exampleModal">
        Checkout
    </button> -->
</form>

<div class="modal" id="exampleModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="{{ route('order')}}" id="submit" class="btn btn-success success">Submit</a>
            </div>
        </div>
    </div>
</div>

@section('js')

<script>
    $('#checkout-form').on('submit', function(e) {
        e.preventDefault();

        var invoice = $("input[name=invoice]").val();
        var id_employee = $("input[name=id_employee]").val();
        var total = $("input[name=total]").val();

        var url = '/kasir/employee/order';

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: url,
            data: {
                invoice: invoice,
                id_employee: id_employee,
                total: total
            },
            success: function(data) {

                console.log("sdasd");

            },
            error: function(data) {
                console.log('Error:', data);
                alert("gagal");
            }
        });
    });
</script>

@endsection