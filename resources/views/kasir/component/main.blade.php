@extends('kasir.app')

@section('content')
<div class="row pt-3">
    <div class="col-md-9">
        @include('kasir.component.list_product')
    </div>
    <div class="col-md-3">
        @include('kasir.component.checkout')
    </div>
</div>
@endsection