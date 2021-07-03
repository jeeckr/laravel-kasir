@section('style_css')
<style>
    .card-list-product {
        width: 100% !important;
        height: 370px !important;
    }

    .card-item-product {
        display: flex;
        flex-direction: row;
        margin: 5px;
        /* padding: 5px; */
        width: 32%;
        height: 100px;
        font-size: 15px;
        align-items: center;
        padding-left: 0 !important;
    }

    .img-product {
        width: 190px;
        height: 100px;
    }

    .description-product {
        flex-direction: column;
        padding: 18px !important;
        padding-left: 25px !important;
    }

    .card-header-product {
        background-color: white;
        border: none;
        border-bottom: solid 1px rgba(0, 0, 0, 0.125) !important;
        /* display: flex;
        flex-direction: row; */
    }

    .form-search {
        float: right;
    }

    .search-input {
        height: 30px;
        border-radius: 20px;
    }

    .btn-search {
        border-radius: 50%;
        padding: 1%;
        width: 30px !important;
        height: 30px;
    }

    .card-product {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        width: 70%;
    }

    .column-btn-add {
        padding-top: 35px !important;
    }

    .card-body-list-product {
        padding: 0px !important;
    }

    .card-horizontal {
        display: flex;
        flex: 1 1 auto;
    }

    /* style list product 2 */
    .btn-biasa {
        padding: 0px;
        width: 30px;
        height: 30px;
        border-radius: 50%;
    }

    .btn-gojek {
        padding: 0px;
        width: 30px;
        height: 30px;
        border-radius: 50%;
    }
</style>
@endsection

<div class="card card-product ml-3 mr-3">
    <div class="card-header card-header-product">
        <div class="row">
            <div class="col-md-6 pt-1">
                <h5> <b class="text-primary">Daftar Menu</b></h5>
            </div>
            <div class="col-md-6">
                <form class="form-inline my-2 my-lg-0" action="#">
                    @csrf
                    <!-- <input class="form-control mr-sm-2" name="cari" type="search" placeholder="Cari" aria-label="Search" id="product_search" style="border-radius: 55px; height: 2rem"> -->
                    <input class="form-control mr-sm-2" name="fcari" placeholder="Cari" aria-label="Search" id="fsearch" style="border-radius: 55px; height: 2rem">
                    <!-- <button class="btn btn-primary btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i>
                    </button> -->
                </form>
            </div>
        </div>
    </div>

    <div class="card-body overflow-auto card-list-product">
        <div class="container">
            <div class="row" id="item-product">
                <!-- <input type="text" id="value_product"> -->

                @foreach($products as $data)
                @include('kasir.component.item_product')
                @endforeach
            </div>
        </div>
    </div>
</div>




@section('js')
<script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>

<script>
    function add_cart(e) {
        console.log(e.getAttribute('data-id'));

        var id = e.getAttribute('data-id');
        var url = '/kasir/employee/dashboard';

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: url,
            data: {
                id: id
            },
            success: function(data) {
                console.log(data.total);
                let cek = document.getElementById("data-product");
                cek.innerHTML = data.html;

                let total = document.getElementById("total_checkout");
                total.innerHTML = data.total;
            },
            error: function(data) {
                console.log('Error:', data);

            }
        });
    }

    function add_qty(e) {
        // console.log(e.getAttribute('data-id'));
        var id = e.getAttribute('data-id');
        // var id = $(this).data('id');
        var url = "/kasir/employee/dashboard/add_qty/";

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: url,
            data: {
                id: id
            },
            success: function(data) {
                let cek = document.getElementById("data-product");
                cek.innerHTML = data.html;

                let total = document.getElementById("total_checkout");
                total.innerHTML = data.total;
            },
            error: function(data) {
                console.log('Error:', data);

            }
        });
        // });
    }

    function min_qty(e) {
        var id = e.getAttribute('data-id');
        var url = "/kasir/employee/dashboard/min_qty/";

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: url,
            data: {
                id: id
            },
            success: function(data) {
                let cek = document.getElementById("data-product");
                cek.innerHTML = data.html;

                let total = document.getElementById("total_checkout");
                total.innerHTML = data.total;
            },
            error: function(data) {
                console.log('Error:', data);

            }
        });
        // });
    }

    function delete_item(e) {

        var id = e.getAttribute('data-id');
        var url = "/kasir/employee/dashboard/delete_item/";

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: url,
            data: {
                id: id
            },
            success: function(data) {
                console.log(data);
                let cek = document.getElementById("data-product");
                cek.innerHTML = data.html;

                let total = document.getElementById("total_checkout");
                total.innerHTML = data.total;
            },
            error: function(data) {
                console.log('Error:', data);

            }
        });
    }

    document.getElementById('fsearch').addEventListener('input', onInput);

    function onInput() {
        let duration = 800;
        clearTimeout(this._timer);
        this._timer = setTimeout(() => {
            var url = "/kasir/employee/dashboard/search";
            console.log(this.value);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                type: "POST",
                data: {
                    search: this.value
                },
                success: function(data) {

                    console.log(data);

                    let cek = document.getElementById("item-product");
                    console.log(cek.innerHTML);

                    cek.innerHTML = data;


                    // reset listener

                    // response(data);
                },
                error: function(data) {
                    console.log('Error:', data);

                }
            })
        }, duration);
    }
</script>
@endsection