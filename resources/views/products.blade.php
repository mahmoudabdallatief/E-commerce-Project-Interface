@extends('layout')
@section('title','Products')

@section('content')
@if(session('success'))
    <input type="hidden" class = "session" value="{{session('success')}}">
@endif
<div class="swiper slide-con position-relative">
    <div class="swiper-wrapper">
        @php
            $img = array("image1", "image2", "image3", "image4");
            $arr = array(
                array(
                    "title" => "Defining e-commerce",
                    "par" => "The term was coined and first employed by Dr. Robert Jacobson, Principal Consultant to the California State Assembly's Utilities & Commerce Committee, in the title and text of California's Electronic Commerce Act, carried by the late Committee Chairwoman Gwen Moore (D-L.A.) and enacted in 1984.",
                    "image" => $img[0] . ".jpg"
                ),
                array(
                    "title" => "Forms",
                    "par" => "Contemporary electronic commerce can be classified into two categories. The first category is business based on types of goods sold (involves everything from ordering \"digital\" content for immediate online consumption, to ordering conventional goods and services, to \"meta\" services to facilitate other types of electronic commerce). The second category is based on the nature of the participant (B2B, B2C, C2B and C2C).",
                    "image" => $img[1] . ".jpg"
                ),
                array(
                    "title" => "Governmental regulation",
                    "par" => "In the United States, California's Electronic Commerce Act (1984), enacted by the Legislature, and the more recent California Privacy Rights Act (2020), enacted through a popular election proposition, control specifically how electronic commerce may be conducted in California. In the US in its entirety, electronic commerce activities are regulated more broadly by the Federal Trade Commission (FTC).",
                    "image" => $img[2] . ".jpg"
                ),
                array(
                    "title" => "Global trends",
                    "par" => "In 2010, the United Kingdom had the highest per capita e-commerce spending in the world.[23] As of 2013, the Czech Republic was the European country where e-commerce delivers the biggest contribution to the enterprises' total revenue. Almost a quarter (24%) of the country's total turnover is generated via the online channel.",
                    "image" => $img[3] . ".jpg"
                )
            );
        @endphp
        @foreach ($arr as $key => $value)
            @php $delay = $key * 5; @endphp
            <div class="swiper-slide slide position-relative">
                <img src="{{ asset('slider-images/' . $value['image'])}}" alt="" class="wow animate__animated animate__fadeInLeftBig img-slide" data-wow-duration="2s" data-wow-delay="{{ $delay }}s">
                <div class="position-absolute slide-text">
                    <h3 class="wow animate__animated animate__fadeInDown mb-3" data-wow-duration="5s" data-wow-delay="{{ $delay }}s"><b>{{ $value["title"] }}</b></h3>
                    <p class="wow animate__animated animate__fadeInUp" data-wow-duration="5s" data-wow-delay="{{ $delay }}s">{{ $value["par"] }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="swiper-button-prev sli-prev position-absolute"></div>
    <div class="swiper-button-next sli-next position-absolute"></div>
</div>
<h2 class="animation" id="typewriter">E-commerce Website</h2>
<div class="container my-2">
<section class="py-3">
<div class="container p-0">
 <div class="row">
<div class="col-lg-3 order-2 order-lg-1">

             
<ul class="list-unstyled small w-100">
            <li class="mb-2 mt-2 w-100">
            <a class="category hvr-pop w-100 shadow {{ empty(request('cat_id')) ? 'ac' : '' }}" href="{{ route('index') }}">ALL Products</a>
            </li>
          </ul>

          <div class="w-100">
          @foreach($categories as $main)
  <h5 class="mb-4 mt-5 head-cat shadow">{{ $main->cat }}</h5>
  <ul class="list-unstyled small w-100">
    
    @foreach($main->children as $row_cat)
    
      <li class="mb-2 mt-2 w-100">
      <a class="hvr-pop shadow w-100 category {{ url('/category/' . $row_cat->id) == url()->current() ? 'ac' : '' }}"
   href="{{ url('/category/' . $row_cat->id) }}">
  {{ $row_cat->cat }}
</a>

      </li>
    @endforeach
  </ul>
@endforeach

  
  </div>
  </div>
              
<div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
<div class="row">
@foreach($products as $product)
              @php
                $img = $product->cover;
                $img_explode = explode(",", $img);
                $img_count = count($img_explode);
                $time = date('m/d/Y H:i:s', time());
                $time_num = strtotime($time) + 3600;
                $date = $product->date;
                $date_num = strtotime($date);
              @endphp

              <div class="col-lg-4 col-sm-6 mb-3">
                <div class="card w-100 h-100 shadow-lg">
                  <div class="h-100 @if ($date_num > $time_num)
    new
@endif hvr-pop">
                    <a href="{{ route('single', ['id' => $product->id]) }}">
                    @foreach($img_explode as $key => $value)
  @if($key == 0)
  <img src="/images/{{ $value }}" class="w-100 h-100" alt="..." title="{{ $product->name }}">
  @endif
@endforeach
                    </a>
                  </div>
                </div>
              </div>
            @endforeach
      


            {{ $products->links('pagination.custom') }}
 </div>
 </div>
 </div>
</div>
</section>
</div>
@endsection
