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
        width: 23rem;
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
                <div class="col-md-4">Nama</div>
                <div class="col-md-3">QTY</div>
                <div class="col-md-3">Harga</div>
                <div class="col-md-2">#</div>
            </div>
            <div id="data-product" style="height: 20rem; overflow-y: scroll; overflow-x: hidden">

                @include('kasir.component.list_checkout')

            </div>
        </div>
        <div class="card-footer pl-4 pr-4">
            <div class="row footer-checkout">
                <div class="total mr-auto">TOTAL</div>

                <div id="total_checkout">
                    @include('kasir.component.total_checkout')
                </div>

            </div>
        </div>
    </div>
    
    <input type="hidden" name="id_employee" id="id_employee" value="{{$employee->id}}">

    <a type="button" name="btn" value="Submit" id="submitBtn" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-checkout">
        Checkout
    </a>

    <div class="modal" id="exampleModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Checkout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Simpan pesanan ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="width: 5rem" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-success" style="width: 5rem" data-toggle="modal" data-target="#exampleModal">
                        Ya
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- <button type="submit" class="btn btn-primary btn-checkout" data-toggle="modal" data-target="#exampleModal">
        Checkout
    </button> -->
</form>