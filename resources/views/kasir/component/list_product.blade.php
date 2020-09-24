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

<div class="card card-product">
    <div class="card-header card-header-product">
        <div class="row">
            <div class="col-md-6">
                <b class="text-primary">Daftar Menu</b>
            </div>
            <div class="col-md-6">
                <form class="form-inline my-2 my-lg-0 form-search">
                    @csrf
                    <input class="form-control mr-sm-2 search-input" name="cari" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="test"></div>
    <div class="card-body overflow-auto card-list-product">
        <div class="container">
            <div class="row">
                @foreach($products as $data)

                <!-- <div class="card card-item-product shadow-sm p-3 bg-white rounded">
                    <div class="card-body card-body-list-product">

                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ $data->showImage() }}" class="card-img-left img-product img-thumbnail" alt="...">
                            </div>
                            <div class="col-md-6">
                                <div class="description-product">
                                    <div class="card-title">
                                        <h5> {{ $data->name }}</h5>
                                    </div>
                                    <div class="card-price">
                                        Rp. {{ $data->price }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="column-btn-add">

                                    <a href="#" data-id="{{ $data->id }}" class="add-cart"><i class="fa fa-plus-square-o fa-2x " aria-hidden="true"></i></a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div> -->

                <div class="card" style="height: 100px;width: 32%; margin:5px;">
                    <div class="card-horizontal">
                        <div class="img-square-wrapper">
                            <img class="" src="{{ $data->showImage() }}" alt="Card image cap" style="width: 100px; height:100px;">
                        </div>
                        <div class="card-body p-0">
                            <div class="description pl-2">
                                <h5 class="card-title m-0 pt-3">{{ $data->name }}</h5>

                            </div>
                            <div class="button pl-2 pt-1">
                                <div class="row pl-3 mt-3">
                                    <div class="col pl-0">
                                        <h6 class="m-0 pt-1">Rp. 5000</h6>
                                    </div>
                                    <div class="col ">
                                        <a href="" class="btn btn-primary btn-biasa">+</a>
                                        <a href="" class="btn btn-success btn-gojek">+</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="button-group">
    <button class="btn btn-primary"><i class="fa fa-plus-square-o fa-2x " aria-hidden="true"></i> </button>
</div>



@section('js')
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    $(".add-cart").on('click', function() {
        console.log($(this).data('id'));

        var id = $(this).data('id');
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
                console.log(data);
                let cek = document.getElementById("data-product");
                cek.innerHTML = data.html;
            },
            error: function(data) {
                console.log('Error:', data);

            }
        });
    });

    $('.search-input').on('keyup', function() {
        $value = $(this).val();
        // console.log($value);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/kasir/employee/dashboard/search',
            dataType: 'json',
            type: 'POST',
            // delay: 250,
            data: {
                'search': $value
            },
            success: function(data) {
                console.log("success");
                $('.test').html(data);
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
</script>
@endsection