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

    .fa-minus-circle,
    .fa-plus-circle {
        color: blue;
    }

    .product-name {
        font-size: 15px
    }
</style>

@if(Session::has('cart'))
@foreach(Session::get('cart') as $data)
<div class="card card-item-checkout">
    <div class="card-body item-checkout">

        <input type="hidden" name="id_product[]" value="{{ $data['id'] }}">
        <input type="hidden" name="total_qty[]" value="{{ $data['total_qty'] }}">
        <input type="hidden" name="total_price[]" value="{{ $data['total_price'] }}">

        <div class="row">
            <div class="col-md-5 pl-4">
                <div class="product-name">{{ $data['name'] }}</div>
            </div>
            <div class="col-md-2 p-0">
                <a href="#" onclick="min_qty(this)" data-id="{{ $data['id'] }}" id="min-qty" class="min-qty"><i class="fa fa-minus-circle" aria-hidden="true"></i>
                </a>
                {{ $data['total_qty'] }}
                <a href="#" type="button" onclick="add_qty(this)" data-id="{{ $data['id'] }}" class="plus-qty"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                </a>
            </div>
            <div class="col-md-3 p-0 pl-3">{{ $data['total_price'] }}</div>

            <div class="col-md-1  p-0">
                <a href="#" type="button" onclick="delete_item(this)" data-id="{{ $data['id'] }}" class=""><i class="fa fa-trash" aria-hidden="true"></i>
                </a>
            </div>

        </div>

    </div>
</div>

@endforeach
@endif