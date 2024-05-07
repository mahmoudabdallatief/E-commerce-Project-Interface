@extends('layout')
@section('title','Cart')
@section('content')

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


@if(session('addtocart'))
<script>
  var viewportWidth = window.innerWidth;

// Trigger the confetti animation with extremely copious particles
confetti({
    particleCount: 20000, // Increase particle count for extremely copious confetti
    spread: viewportWidth,
    origin: { y: 0.6 } // Adjust origin to start from the top
});
</script>
@endif


<div class="container my-5">
  <div class="row">
  <h2 class="h5 col-12 shop-heading mb-5"></h2>
    <div class="col-lg-8 mb-4 mb-lg-0 cart-con">
        @php
        $time = date('m/d/Y H:i:s', time());
        $time_num = strtotime($time) + 3600;
        @endphp
        @if(@$message)
        <p class="text-center w-100 p-3" style="background-color:crimson; color:gold;border-radius:25px;box-shadow: 1px 1px 5px #969191fa, -1px -1px 5px #969191fa;border:1px solid gold;">{{$message}}</p>
        @else
        @foreach($carts as $cart)
        
        <div class="row mb-5   product" id="h{{$cart->id}}">
        
      @php
      $date= $cart->product->date;
        $date_num= strtotime($date);
        $img = $cart->product->cover;
        $img_explode = explode(",", $img);
        $img_count = count($img_explode);
        @endphp
        
        
        <div class="col-md-4 pt-3">
              <div class="w-100 @if ($date_num > $time_num) new @endif">
              @foreach($img_explode as $key => $value)
                        @if($key == 0)
                <a href="{{ route('single', ['id' => $cart->id_pro]) }}">
                  <img class="w-100 mb-3" style="border-radius: 25px;" src="/images/{{ $value}}" title="{{$cart->product->name}}">
                </a>
                @endif
                        @endforeach
                </div>
            </div>
                <div class="col-md-8 pt-4 p-3">
              <h4><b class="text-light">Product : </b><a href="{{ route('single', ['id' => $cart->id_pro]) }}" class="text-decoration-none searchproduct my-3" style="color:gold">{{$cart->product->name}}</a></h4>
              <br>
              <p class="mb-3"><b class="text-light">Price :</b> <span class="@if ($date_num > $time_num)text-decoration-line-through  @endif ">{{$cart->product->price}} $.</span></p>
              @if ($date_num > $time_num)
              <p class="mt-4"><b class="text-light">Offer :</b> {{$cart->product->offer}} $.</p>
               @endif
               <div class="rate my-3">
               @if ($cart->product)
                
               
        @php
        $ratings = $cart->product->Ratings;
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
            @endif
          
            
            
            
</div>
<div class="align-middle border-0 mb-4  m-auto">
                  <br>
                  <div class="border d-flex align-items-center justify-content-center px-3" style="border:1px solid gold !important;">
                    <span class=" text-uppercase   headings-font-family " style="color:#fff !important;font-weight:bold!important;">Quantity</span>
                    <div class="quantity">
                      <button class="dec-btn send p-0" name="action" type="button"><i class="fas fa-caret-left"></i></button>
                      <input class="form-control form-control-sm border-0 shadow-0 p-0 num" name="quantity" type="number" value="{{$cart->quantity}}" max="{{$cart->product->count}}"min="1">
                      <input type="hidden" class="max" value="{{$cart->product->count}}">
                      <input type="hidden" class="price" name="price" value="{{ @$date_num > $time_num ? $cart->product->offer : $cart->product->price  }}">
                      <input type="hidden" class="id" name="id" value="{{$cart->id}}">
                      <button class="inc-btn send p-0" name="action" type="button"><i class="fas fa-caret-right"></i></button>
                    </div>
                  </div>
                </div>
      <p class="mb-2 total" id="a{{$cart->id}}"><b class="text-light">Total :</b> {{$cart->total}} $.</p>
        
      <b class="mb-2 text-light">Remove This Product :</b>
      <button class="btn mb-1 " data-bs-toggle="modal" data-bs-target="#examplemodel{{$cart->id}}">
                  <i class="fa-solid fa-trash-can p-2 rounded" style="color:crimson; background-color:gold; border:1px solid #fff;"></i>
                </button>
                <div class="modal fade" id='examplemodel{{$cart->id}}' tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLabel"><b>Are Yoy Sure You Want To Delete?</b> </h5>
                      </div>
                      <div class="modal-body">
                        <p class="text-start text-dark">
                        {{$cart->name}}
                        </p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="hidden" value="{{$cart->id}}" name="delid" class="delid">
                        <button type="button" class="btn login btn-del" data-bs-dismiss="modal">DELETE</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
          
          
      @endforeach
      @endif
      
      @if(@!$message)
        <div class="my-3 delall text-center">
          <button class="btn del_all" data-bs-toggle="modal" data-bs-target="#examplemodel">Delete All Products From Cart</button>
        </div>
        @endif
        <div class="modal fade" id='examplemodel' tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><b>Are Yoy Sure You Want To Delete?</b> </h5>
            </div>
            <div class="modal-body">
              <p class="text-start">
              All Products From Cart
                </div>
                      <div class="modal-footer">
                
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="{{ route('deleteallfromcart')}}" method="POST">
    @csrf
    <button type="submit" class="btn del_all">DELETE</button>
</form>
                      </div>
                </div>
                  </div>
                </div>
      
       </div>
                <div class="col-lg-4 mb-4 mb-lg-0 ">
              <div class="card  border-0 rounded-0 p-lg-4 custom-cart "style="box-shadow: 1px 1px 5px #969191fa, -1px -1px 5px #969191fa;">
                <div class="card-body  pt-1 ">
                  <h5 class="text-uppercase mb-4 pt-1 text-light">Cart total</h5>
                  <ul class="list-unstyled mb-0">
                  <li class="d-flex align-items-center justify-content-between mb-3"><strong class="text-uppercase text-light font-weight-bold">Sum Total</strong><span class="text-muted tot " id="co">
                  @if($sum== NULL)
                  0
                  @else
                  {{$sum}}
                  @endif 
                  $.</span></li>
                  
                    <li class="coupon-item">
                    @if(@!$message)
                        <div class="form-group coupon mb-0">

                          <button class="btn  coupon-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <i class="fas fa-gift mr-2"></i> Check Out</button>
                        </div>
                        @else
                         <br>
                         <br>
                         <br>
                         @endif
                        </li>
                        
                  </ul>
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color:crimson !important;" id="staticBackdropLabel">Check-Out</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form  method="POST" id="checkout-Form">
  @csrf
  <h3 class="bill">Billing Information</h3>
  <div class="row">
    <div class="col-12">
      <label for="billing_name">Name:</label>
      <input type="text" name="billing_name" id="billing_name" class="w-100 form-control">
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <label for="billing_address">Address:</label>
      <input type="text" name="billing_address" id="billing_address" class="w-100 form-control">
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <label for="billing_city">City:</label>
      <input type="text" name="billing_city" id="billing_city" class="w-100 form-control">
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <label for="billing_state">State:</label>
      <input type="text" name="billing_state" id="billing_state" class="w-100 form-control">
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <label for="billing_zip">Zip Code:</label>
      <input type="text" name="billing_zip" id="billing_zip" class="w-100 form-control">
    </div>
  </div>

  <h3 class="bill">Shipping Information</h3>
  <div class="row">
    <div class="col-12">
      <label for="shipping_name">Name:</label>
      <input type="text" name="shipping_name" id="shipping_name" class="w-100 form-control ">
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <label for="shipping_address">Address:</label>
      <input type="text" name="shipping_address" id="shipping_address" class="w-100 form-control">
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <label for="shipping_city">City:</label>
      <input type="text" name="shipping_city" id="shipping_city" class="w-100 form-control">
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <label for="shipping_state">State:</label>
      <input type="text" name="shipping_state" id="shipping_state" class="w-100 form-control ">
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <label for="shipping_zip">Zip Code:</label>
      <input type="text" name="shipping_zip" id="shipping_zip" class="w-100 form-control ">
    </div>
  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn login">Place Order</button>
  </div>
  
</form>
</div>

              </div>
              
            </div>        
              
                </div>
              </div>
            </div>
            </div>
            </div>
    </div>
</div>

@endsection