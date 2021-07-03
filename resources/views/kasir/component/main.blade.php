@extends('kasir.app')

@section('content')
<div class="row pt-3">

    @include('kasir.component.list_product')

    @include('kasir.component.checkout')

</div>
@endsection