@extends('layout')
@section('title', 'Orders')
@section('content')
@if(session('success'))
<script>
    
  Swal.fire({
          position: 'top-top',
          icon: 'success',
          title: "{{session('success')}}",
          showConfirmButton: false,
          timer: 2000,
      
        })
        
</script>
@endif
@if(session('failed'))
<script>
    
  Swal.fire({
          position: 'top-top',
          icon: 'error',
          title: "{{session('failed')}}",
          showConfirmButton: false,
          timer: 2000,
      
        })
        
</script>
@endif
    @php
        $id = 1;
        $time = date('m/d/Y H:i:s', time());
        $time_num = strtotime($time) + 3600;
    @endphp
    <div class="container mb-5">
        <div class="row">
            <h2 class="h5 col-12 order-heading my-5"></h2>
            <div class="col-12">
                @if(isset($num))
                    <p style="color:crimson; font-size:30px; margin-bottom:100px; margin-top:100px;" class="text-center">{{$num}}</p>
                @else
                    <h1 style="color:crimson;" class="mb-3">Orders Information</h1>
                    @foreach($orders as $order)
                        <h4 style="color:crimson;" class="my-4 fs-bold">Order number : {{$id++}}</h4>
                        <div class="col-12 ">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    {{-- Product Cards --}}
                                    @php
                                        $ids = explode(',', $order->order_details->product_id);
                                        $quantityArr = explode(',', $order->order_details->count);
                                        $totalArr = explode(',', $order->order_details->total);
                                        $productCounts = array_combine($ids, $quantityArr);
                                        $productTotals = array_combine($ids, $totalArr);
                                        $productDetails = \App\Models\Product::whereIn('id', $ids)->with('Ratings')->get()->sortBy(function ($product) use ($ids) {
                                            return array_search($product->id, $ids);
                                        });
                                    @endphp
                                    @foreach ($productDetails as $details)
                                        @php
                                            $date = $details->date;
                                            $date_num = strtotime($date);
                                            $img = $details->cover;
                                            $img_explode = explode(",", $img);
                                            $img_count = count($img_explode);
                                            $ratings = $details->ratings;
                                            $round = 0;
                                            $count = 0;
                                            if ($ratings) {
                                                $round = round($ratings->avg('rating'));
                                                $count = $ratings->count();
                                            }
                                        @endphp
                                        <div class="col-12 product mb-5">
                                            <div class="row ps-lg-2 ps-md-2">
                                                <div class="col-md-4 pt-3 ">
                                                    <div class="w-100   @if ($date_num > $time_num) new @endif">
                                                        @foreach($img_explode as $key => $value)
                                                            @if($key == 0)
                                                                <a href="{{ route('single', ['id' => $details->id]) }}">
                                                                    <img class="w-100 mb-3" style="border-radius: 25px;" src="/images/{{ $value }}" title="{{$details->name}}">
                                                                </a>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-md-8 pt-4 p-3">
                                                    <h4><b class="text-light">Product : </b><a href="{{ route('single', ['id' => $details->id]) }}" class="text-decoration-none searchproduct my-3" style="color:gold">{{$details->name}}</a></h4>
                                                    <br>
                                                    <p class="mb-3"><b class="text-light">Price :</b> <span class="@if ($date_num > $time_num)text-decoration-line-through  @endif ">{{$details->price}} $.</span></p>
                                                    @if ($date_num > $time_num)
                                                        <p class="mt-4"><b class="text-light">Offer :</b> {{$details->offer}} $.</p>
                                                    @endif
                                                    <div class="rate my-3">
                                                        @if ($count  == 0)
                                                            <span style="color:gold !important;"><span style="color:#fff !important;"><b>Product Rating :</b> </span> 0 </span>
                                                        @else
                                                            <span class="me-2" style="color:#fff !important;">
                                                                <span class="me-2" style="color:#fff !important;"><b>Rating For This Product :</b></span>
                                                                @for ($s = 1; $s <= 5; $s++)
                                                                    <i class="fa fa-star fa-1x " style="{{ $s <= $round ? 'color: gold !important;' : '' }}" data-index="{{ $s }}"></i>
                                                                @endfor
                                                                Based on {{ $count }} Rating
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <p class="my-2 "><b class="text-light">Quantity :</b> {{$productCounts[$details->id]}}.</p>
                                                    <p class="my-2 "><b class="text-light">Total :</b> {{$productTotals[$details->id]}} $.</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 product" style="height:fit-content !important;">
                                    {{-- Sidebar Content --}}
                                    <ul  style="list-style-type:none; ">

   
    <li class='mb-2 mt-2'><b class='text-light me-2'>Billing Name :</b>{{ $order->billing_name }}.</li>
    <li class='mb-2'><b class='text-light me-2'>Billing Address :</b>{{ $order->billing_address }}.</li>
    <li class='mb-2'><b class='text-light me-2'>Billing City :</b>{{ $order->billing_city }}.</li>
    <li class='mb-2'><b class='text-light me-2'>Billing State :</b>{{ $order->billing_state }}.</li>
    <li class='mb-2'><b class='text-light me-2'>Billing Zip Code :</b>{{ $order->billing_zip }}.</li>
    <li class='mb-2'><b class='text-light me-2'>Shipping Name :</b>{{ $order->shipping_name }}.</li>
    <li class='mb-2'><b class='text-light me-2'>Shipping Address :</b>{{ $order->shipping_address }}.</li>
    <li class='mb-2'><b class='text-light me-2'>Shipping City :</b>{{ $order->shipping_city }}.</li>
    <li class='mb-2'><b class='text-light me-2'>Shipping State :</b>{{ $order->shipping_state }}.</li>
    <li class='mb-2'><b class='text-light me-2'>Shipping Zip Code :</b> {{ $order->shipping_zip }}.</li>
    <li class='mb-2 mt-2'><b class='text-light me-2'>Total of All Products :</b>{{ $order->total }} $.</li>
    @if($order->status == 'Unpaid')
    <form action="{{route('paymob')}}" method="GET">
        <input type="hidden" value="{{$order->id}}" name ="id">
        <button class="btn mb-1 " type="submit" style="color:crimson; background-color:gold; border:1px solid #fff;">
        <i class="fa-regular fa-credit-card" ></i><b class=' me-2'> Pay Now</b>
        
                </button>
    </form>
    @endif
</ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
