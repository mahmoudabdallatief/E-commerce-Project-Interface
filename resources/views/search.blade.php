@extends('layout')
@section('title',$pagename)
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
    <div class="col-12 mb-5 search-head h5">
   </div>
@if($num > 0)
@foreach($products as $product)
@php
$time = date('m/d/Y H:i:s', time());
$time_num= strtotime($time)+3600;
$date= $product->date;
$date_num= strtotime($date);
$image = $product->cover;
$explode = explode(",", $image);
@endphp
<div class="col-12   ">
    <div class="card p-2 mt-3 mb-5 product">
        <div class="row g-0">
            <div class="col-md-4 ">
         
                    <div class="w-100 {{$date_num > $time_num ? 'new' : ''}}">
                    <a href="{{route('single',['id'=> $product->id])}}" >
                    @foreach ($explode as $key => $value)
                                @if ($key == 0)
                    <img class="w-100 " src="/images/{{$value}}" title="{{$product->name}}">
                    @endif
                    @endforeach
                    </a>
                    </div>
            </div>
            <div class="col-md-8 ps-md-3 ps-lg-3 mt-3">
            <h4><b class="text-light">Product : </b><a href="{{route('single',['id'=>$product->id])}}" class="text-decoration-none searchproduct" style="color:gold">{{$product->name}}</a></h4>
            <p class="mt-4"><b class="text-light">Price :</b> <span class="{{$date_num > $time_num ? 'text-decoration-line-through' : ''}}">{{$product->price}} $.</span></p>
       @if($date_num > $time_num)
       <p class="mt-4"><b class="text-light">Offer :</b> {{$product->offer}} $.</p>
      @endif
       <div class="rate my-4">
       @php
$ratings = $product->Ratings;
      $round = round($ratings->avg('rating'));
      $count = $ratings->count();
@endphp
            @if ($count  == 0)
                <span style="color:gold !important;"><span style="color:#fff !important;"><b>Product Rating :</b> </span> 0 </span>
            @else
           
                <span class="me-2" style="color:#fff !important;">
                    <span class="me-2" style="color:#fff !important;">
                        <b>Rating For This Product :</b>
                    </span>
                    @for ($s = 1; $s <= 5; $s++)
                        <i class="fa fa-star fa-1x " style="{{ $s <= $round ? 'color: gold !important;' : '' }}" data-index="{{ $s }}"></i>
                    @endfor
                    Based on {{ $count }} Rating
                </span>
            @endif
          </div>
          </div>
        </div>
        
    </div>
</div>
@endforeach
@else
<div class="col-12 ">
            <div style="color:crimson; margin:120px auto 160px auto; text-align:center;  letter-spacing: 5px; font-size:30px; text-transform:uppercase;">Data NoT Found
        </div>
            </div>
            @endif
            {{ $products->appends(['search_query' => request('search_query')])->links('pagination.custom') }}
    </div>
</div>
@endsection