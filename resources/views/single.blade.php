@extends('layout')

@section('title', 'Single-Product')

@section('content')
<br>
<br>
<div class="container mb-5">
    <div class="row">
    <div class="col-12 mb-5 single-head h5">
     </div>
        @php
        $img = $product->cover;
        $img_explode = explode(",", $img);
        $img_count = count($img_explode);
        $time = date('m/d/Y H:i:s', time());
        $time_num = strtotime($time) + 3600;
        $date = $product->date;
        $date_num = strtotime($date);
        @endphp
        <div class="col-12 mb-4">
            <div class="p-2 product card  text-start">
                <div class="row g-0">
                    <div class="col-md-4">
                        <div class="d-flex">

                        
                        @foreach($img_explode as $key => $value)
                        @if($key == 0)
                        <div class="d-block w-100">
                        <img loading="lazy" src="/images/{{ $value }}" class="w-100 h-100  big_img" alt="..." title="{{ $product->name }}">
                        </div>
                        
                        @endif
                        @endforeach
                        </div>
                        <div class="d-flex justify-content-around mt-3">
                            @foreach (explode(',', $product->cover) as $image =>$value)
                            <div class="d-block m-1 ">
                                <img loading="lazy" src="/images/{{ $value }}" class="w-100 small_img   @if($image == 0) gallery @endif" height=100 alt="..." title="" style="cursor:pointer; border-radius: 5px;">
                            </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4><b class="text-light">Product :</b> {{$product->name}}.</h4>
                            <br>
                            <p><b class="text-light">Price :</b> <span class="@if ($date_num > $time_num)text-decoration-line-through @endif"> {{$product->price}} $.</span></p>
                            <p><b class="text-light">Count :</b>  {{$product->count}}.</p>
                            <p><b class="text-light">Category :</b> {{$product->category->cat}}.</p>
                            <p><b class="text-light">Brand :</b>  {{$product->Brand->brand}}.</p>
                            <b class="text-light">Description :</b><br><p>{{strip_tags($product->des)}}</p>
                            @if ($date_num > $time_num)
                            <input type="hidden" class="date" value="{{$product->date}}">
                            <div id="finish">
                                <p style="width:fit-content;"><b class="text-light">Offer :</b> {{$product->offer}} $.</p>
                                <p><b class="text-light">This offer will finish after :</b></p>
                                <div class="d-flex justify-content-center">
                                    <div class="d-block m-2">days</div>
                                    <div class="d-block m-2">hours</div>
                                    <div class="d-block m-2">minutes</div>
                                    <div class="d-block m-2">seconds</div>
                                </div>
                                <div class="d-flex time-div justify-content-center">
                                    <div id="days" class="d-block m-2 p-2"></div>
                                    <div id="hours" class="d-block m-2 p-2"></div>
                                    <div id="minutes" class="d-block m-2 p-2"></div>
                                    <div id="seconds" class="d-block m-2 p-2"></div>
                                </div>
                            </div>
                            @endif
                            <form class="quantity justify-content-center mt-5" method="post" action="{{ route('addtocart') }}">
                              @csrf
    <button class="dec-btn  p-0" name="action" type="button"><i class="fas fa-caret-left"></i></button>
    <input class="form-control form-control-sm border-0 shadow-0 p-0 num" type="number" value="1" name="quantity" min="1" max="{{$product->count}}">
    <input type="hidden" class="max" value="{{$product->count}}">
    <button class="inc-btn  p-0" name="action" type="button"><i class="fas fa-caret-right"></i></button>

    <input type="hidden" name="pro_id" value="{{ $product->id }}" class="product_id">
    <input type="hidden" name="price" value="{{ $date_num > $time_num ? $product->offer : $product->price  }}">

    <div class="d-block ms-4">
        <button class="addtochart btn w-100" type="submit" name="addtochart">Add to Cart</button>
    </div>
</form>
<div class="rate my-3">
    <div class="rate-display">
    @php
$ratings = $product->Ratings;
      $round = round($ratings->avg('rating'));
      $count = $ratings->count();
@endphp
@if($count==0)
<span style="color:gold !important;"><span style="color: #fff !important;"><b>Product Rating :</b></span> 0 </span>
@else

<span class="me-2" style="color:#fff !important;"><span class="me-2" style="color:#fff !important;"><b>Rating For This Product :</b></span> 
       @for($s=1; $s <=5 ; $s++) 
        <i class="fa fa-star fa-1x " style="{{ $s<=$round ? 'color:gold !important;':'' }}" data-index="{{$s}}"  ></i>
        
       @endfor  Based on {{$count}} Rating</span>
@endif


                              </div>
                           </div>
                           <br>
                           @if(session('login'))
                           
                           <span class="" style="color:#fff !important;"><b>Rate The Product : (Your Rating) </b></span>
    <div align="left" style="color:#fff;">
    @for($e=1; $e<=5; $e++)
      <i class="fa fa-star fa-1x star" style="{{$e <= $rating_user_avg ? 'color: gold !important' : ''  }}" data-index="{{ $e }}"  ></i>
      @endfor
   <br>
   
                           @else
                           <p class="text-center mb-5 h5"  style="color:gold; ">You Are Not Allow To Rate This Product Because You Are Not Logged in</p>
                           @endif
                           <br>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container ">
<div class="row co">
     @if(session('login'))
     
          <div class="text-center mb-5"><button  class="btn login add-comment"   data-bs-toggle="modal" data-bs-target="#exampleModal">Add Comment</button></div>
          <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:crimson; ">Add a Comment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <textarea name="message"  class="w-100 my-3 message shadow" style="height:350px; border:1px solid crimson; border-radius:5px; color:crimson; "></textarea>
      <input type="hidden" class="pro" name ="pro" value="{{$product->id}}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn login comm" data-bs-dismiss="modal">Add</button>
      </div>
    </div>
  </div>
</div>

         @else
          <p class="text-center mb-5 h5"  style="color:crimson; ">You Are Not Allow To Write Comment Because You Are Not Logged in</p>
          @endif
          </div>
      </div>
      
      <div class="container comment-con mb-5">
        <div class="row comment">
        <div class="col-12 my-5 comment-head h5">
     </div>
            @if(@$message)
            <p class="text-center mb-5 h5 num-row" style="color:crimson; ">{{$message}}</p>
            @else
            @foreach($comments as $comment)
            @php
            $mysqlTimestamp = strtotime($comment->date);
            $dateWithDayName = date("l, F j, Y \\A\\t h:i:s A", $mysqlTimestamp);
            @endphp
            <div class="col-12 comment-row" id="c{{$comment->id}}">
  <div class=" comment-header ">
    <h3 style="text-transform:capitalize">{{$comment->name}} <span class="ms-1  days" id="s{{$comment->id}}">
        {{"( ".$dateWithDayName." )"}} 
  </span></h3>
    
    </div>
    <div class="comment-body">
    <p id="p{{$comment->id}}">{{$comment->comment}}</p>
    </div>
    @if(session('login')==$comment->id_user)
  <div class="comment-footer">
    <button class ="btn " data-bs-toggle="modal" data-bs-target="#exampleModal{{$comment->id}}"><i class="fa-solid fa-user-pen"></i></button>
    <div class="modal fade" id="exampleModal{{$comment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <h5 class="modal-title" id="exampleModalLabel " style="color:crimson; ">Edit a Comment</h5>
        <button type="button" class="btn-close bg-transparent" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <textarea name="message" id="m{{$comment->id}}"  class="w-100 my-3  shadow" style="height:350px; border:1px solid crimson; border-radius:5px;font-size: 16px; color:crimson;">{{$comment->comment}}</textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary bg-secondary text-light" data-bs-dismiss="modal">Close</button>
        <input type="hidden" name ="update" class="inp-update" value="{{$comment->id}}">
        <button type="button" class="btn  update" data-bs-dismiss="modal" >Edit</button>
      </div>
    </div>
  </div>
</div>
    <button class ="btn" data-bs-toggle="modal" data-bs-target="#exampleModalt{{$comment->id}}"><i class="fa-solid fa-trash-can" ></i></button>
    <div class="modal fade " id="exampleModalt{{$comment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <h5 class="modal-title" id="exampleModalLabel " style="color:crimson; ">Are Yoy Sure You Want To Delete?</h5>
        <button type="button" class="btn-close bg-transparent" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p style="color:crimson; font-size: 16px;" id="i{{$comment->id}}">

        {{$comment->comment}}
        </p>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary bg-secondary text-light" data-bs-dismiss="modal">Close</button>
         <input type="hidden" class="pro" name ="pro" value="{{$product->id}}">
        <button type="button" class="btn del_all delete" data-bs-dismiss="modal" name="delete"data-delete="{{$comment->id}}">DELETE</button>
      </div>
    </div>
  </div>
</div>
  </div>
  @endif
 </div>
            @endforeach
            @endif
     </div>
      </div>
 
<div class="container mt-3">
  <div class="row">
   <div class="col-12 mb-5 rel-head h5">
     </div>
     @foreach($related_products as $related_product)
    @php
        $rel_img = $related_product->cover;
        $img_rel_explode = explode(",", $rel_img);
        $rel_date = $related_product->date;
        $rel_date_num = strtotime($rel_date);
    @endphp

    <div class="col-lg-3 col-sm-12 col-md-6 mb-5">
        <div class="card shadow-lg w-100 h-100 @if ($rel_date_num > $time_num) new @endif hvr-pop">
            <a href="{{ route('single', ['id' => $related_product->id]) }}">
                @foreach($img_rel_explode as $key => $value)
                    @if($key == 0)
                        <img src="/images/{{ $value }}" class="w-100 h-100" alt="{{ $related_product->name }}" title="{{ $related_product->name }}">
                    @endif
                @endforeach
            </a>
        </div>
    </div>
@endforeach

{{ $related_products->links('pagination.custom') }}
   </div>
   </div>
@endsection
