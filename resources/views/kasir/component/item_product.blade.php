<div class="card m-2" style="width: 13rem;">
    <img src="{{ $data->showImage() }}" class="card-img-top" alt="..." style="height: 10rem; object-fit: cover">
    <div class="card-body p-3">
        <h6 class="card-title">{{ $data->name }}</h6>
        <div class="row">
            <div class="col">
                <a href="#" data-id="{{ $data->id }}" onclick="add_cart(this)" class="btn btn-primary add-cart" style="float: right; width: 100%; height: 1.5rem; padding: 0px">+</a>
            </div>
            <div class="col">
                <a href="#" data-id="{{ $data->id }}" class="btn btn-success add-cart" style="float: right;width: 100%; height: 1.5rem; padding: 0px">+</a>
            </div>
        </div>
    </div>
</div>