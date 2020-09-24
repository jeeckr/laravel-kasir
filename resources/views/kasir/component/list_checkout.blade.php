<style>
    .card-item-checkout {
        border: none;
        border-bottom: solid 1px rgba(0, 0, 0, 0.125) !important;

    }

    .item-checkout {
        height: 50px;
        padding: 0;
        padding-top: 12px;
    }
</style>

@if(Session::has('cart'))
@foreach(Session::get('cart') as $data)
<div class="card card-item-checkout">
    <div class="card-body item-checkout">

        <input type="hidden" name="id_product[]" value="{{ $data['id'] }}">
        <input type="hidden" name="total_qty[]" value="{{ $data['total_qty'] }}">
        <input type="hidden" name="total_price[]" value="{{ $data['total_price'] }}">


        <div class="row text-center">
            <div class="col"> {{ $data['name'] }}</div>
            <div class="col">
                <a href="#" data-id="{{ $data['id'] }}" id="min-qty" class="min-qty"><i class="fa fa-minus-circle" aria-hidden="true"></i>
                </a>
                {{ $data['total_qty'] }}
                <a href="#" data-id="{{ $data['id'] }}" class="plus-qty"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                </a>
            </div>
            <div class="col">{{ $data['total_price'] }}</div>
        </div>

    </div>
</div>

@endforeach
@endif

@section('js')
<script>
    $("#min-qty").on('click', function() {
        console.log($(this).data('id'));
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            // url: url,
            data: {},
            success: function(data) {

                console.log("sdasd");

            },
            error: function(data) {
                console.log('Error:', data);
                alert("gagal");
            }
        });
    });
    $(".plus-qty").on('click', function() {
        console.log($(this).data('id'));
    });
</script>
@endsection