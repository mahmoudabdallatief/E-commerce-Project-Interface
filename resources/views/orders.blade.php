@extends('layout')
@section('title','Orders')
@section('content')
<div class="container mb-5">
    <div class="row">
       
    <h2 class="h5 col-12 order-heading my-5"></h2>
        <div class="col-12">
        @if(@$num)
<p style ="color:crimson; font-size:30px; margin-bottom:100px; margin-top:100px;" class="text-center">{{$num}}</p>
@else
        <h1 style ="color:crimson;">Order Confirmation</h1>

<p style ="color:crimson;">Thank you for your order! Your order details are:</p>

@foreach($orders as $order)
<ul class ="product" style="list-style-type:none; ">

    <li class='mb-2 mt-2'><b class='text-light me-2'>Order ID :</b>{{ $order->id }}.</li>
    <li class='mb-2'><b class='text-light me-2'>Billing Name :</b>{{ $order->billing_name }}.</li>
    <li class='mb-2'><b class='text-light me-2'>Billing Address :</b>{{ $order->billing_address }}.</li>
    <li class='mb-2'><b class='text-light me-2'>Billing City :</b>{{ $order->billing_city }}.</li>
    <li class='mb-2'><b class='text-light me-2'>Billing State :</b>{{ $order->billing_state }}.</li>
    <li class='mb-2'><b class='text-light me-2'>Billing Zip Code :</b>{{ $order->billing_zip }}.</li>
    <li class='mb-2'><b class='text-light me-2'>Shipping Name :</b>{{ $order->shipping_name }}.</li>
    <li class='mb-2'><b class='text-light me-2'>Shipping Address :</b>{{ $order->shipping_address }}.</li>
    <li class='mb-2'><b class='text-light me-2'>Shipping City :</b>{{ $order->shipping_city }}.</li>
    <li class='mb-2'><b class='text-light me-2'>Shipping State :</b>{{ $order->shipping_state }}.</li>
    <li class='mb-2'><b class='text-light me-2'>Shipping Zip Code :</b> {{ $order->shipping_zip }}.</li>
    <li class='mb-2 mt-2'><b class='text-light me-2'>Total :</b>{{ $order->total }} $.</li>
</ul>
@endforeach
@endif

        </div>
    </div>
</div>


@endsection