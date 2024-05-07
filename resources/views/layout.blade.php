<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{url('slider-images/images.png')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />  
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
   <script src="{{url('js/sweetalert2.all.min.js')}}"></script>
   
  <link rel="stylesheet" href="{{url('css/style.css')}}">
  <title>@yield('title')</title>
</head>
<body>
<div class="navContainer "style="">


<nav class="navbar navbar-expand-lg navbar-dark ">
      <div class="container ">
        
        <a class="navbar-brand" href="#">
        <img src="{{url('slider-images/images.png')}} "  alt="">
      </a>
      <form class="d-block  d-flex input-group my-auto w-auto my-auto position-relative" id="search-form" action="{{route('search' )}}" method="get">
         @csrf
         <input
         name="search_query" id="search-query"
                autocomplete="off"
              type="text"
                class="form-control rounded in  "
                placeholder='Search '
                style="width: 225px; color:crimson;"
                />

                <button type='submit' class="input-group-text border-0 rounded-1 addtochart"
               >
               <i class="fas fa-search icon_search" ></i>
                   </button>
  
                   <ul id="search-results" class="text-left position-absolute">
 
 </ul>
       </form>
        <button class="btn  navbar-toggler addtochart" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        <i class="fa-solid fa-bars"></i>
      </button>
        <div class="offcanvas  offcanvas-start-lg" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" aria-hidden="true" >
          <div class="offcanvas-header d-flex  d-lg-none " >
           <a class="navbar-brand" href="#">
           <img src="{{url('slider-images/images.png')}}"  alt="">
            </a>
            <a href="javascript:void(0) " class="text-reset p-0" data-bs-dismiss="offcanvas" aria-label="close">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="gold" class="bi bi-x-circle  x-button" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
              </svg>
            </a>
          </div>
          <div class="offcanvas-body p-lg-0 ">
           
          <div class="navbar-nav ms-auto my-auto ">
            <!-- Search form -->
       
      <a class="nav-link py-2 px-3 mx-lg-3  home cat" aria-current="page" href="{{route('index')}}">Home</a>

      @if(request()->routeIs('search'))
    <a class="nav-link py-2 px-3 mx-lg-3 {{ request()->routeIs('search') ? 'active' : '' }} cat" aria-current="page" href="{{route('search',['search_query'=>request()->input('search_query')])}}">Search</a>
@endif
      @if(request()->routeIs('single'))
        <a class="nav-link py-2 px-3 mx-lg-3 cat {{ request()->routeIs('single')? 'active' : '' }} " href="{{ route('single', ['id' => $product->id]) }}">Single-Product</a>
       @endif
      <a class="nav-link py-2 px-3 mx-lg-3 cat {{ request()->routeIs('contact')? 'active' : '' }}" href="{{route('contact')}}">Contact</a>
      @if(session()->has('login'))
      <a class="nav-link py-2 px-3 mx-lg-3 text-center cat {{ request()->routeIs('cart')? 'active' : '' }}   d-inline-block" id="co" href="{{route('cart')}}" tabindex="-1" aria-disabled="true">
        
        
      {{ $cart = DB::table('chart')->where('id_user',session('login'))->count() }}
        

        <i class="fa-solid fa-cart-shopping   d-inline-block"></i>
        
     
      </a>
      <a class="nav-link py-2 px-3 mx-lg-3 cat {{ request()->routeIs('orders')? 'active' : '' }} " href="{{route('orders')}}" tabindex="-1" aria-disabled="true">Orders</a>
      <a class="nav-link py-2 px-3 mx-lg-3 cat" href="{{route('logout')}}" tabindex="-1" aria-disabled="true">Log out</a>
    
      @else
            <a class="nav-link py-2 px-3 mx-lg-3 cat" href="{{route('signup')}}" tabindex="-1" aria-disabled="true">Sign-up</a>
            <a class="nav-link py-2 px-3 mx-lg-3 cat" href="{{route('login')}}" tabindex="-1" aria-disabled="true">Login</a>
            @endif
        
     
          
    </div>
    
    </div>       
  
        
        </div>
        
      </div>
  
    </nav>
   
</div>

@yield('content')
 
<a href="#" class="myBtn"><i class="fa-solid fa-arrow-up shadow"  onclick="topFunction()"  title="Go to top"></i></a>
<footer class="footer mt-0  " >
    <div class="container text-md-start  text-center footer-row">
    <div class="row ">
        <div class="col-md-6 col-lg-4 mt-3">
            <img src="{{url('slider-images/images.png')}} " class="w-25"  alt="">
            <p class="mt-2">Pellentesque in ipsum id orci porta dapibus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.</p>
        <p class="mt-4">Created By <b>Abdullatief</b> </p>
        </div>
      
        <div class="col-md-6 col-lg-2 mt-3">
            <h5>Links</h5>
            <ul class="list-unstyled lh-lg">
            <li >Home</li>
                  <li>Our Services</li>
                  <li>Portfolio</li>
                  <li>Testimonials</li>
                  <li>Support</li>
                  <li>Terms and Condition</li>
            </ul>
        </div>
        <div class="col-md-6 col-lg-2 mt-3">
            <h5>About Us</h5>
            <ul class=" list-unstyled lh-lg">
                  <li>Sign In</li>
                  <li>Register</li>
                  <li>About Us</li>
                  <li>Blog</li>
                  <li>Contact Us</li>
                
                </ul>
        </div>
         <div class="col-md-6 col-lg-4 mt-3 ">
            <h5>Contact Us</h5>
            <p class="mt-3">Get in touch with us via mail phone.We are waiting for your call or message.</p>
            <a class=" rounded-pill btn  hoda w-100 mt-3" href="">hodamedocrv@gmail.com</a>
            <div class="d-flex mt-4 ">
            <div class="block m-2"><i class="fa-brands fa-facebook fa-2x icon"></i></div>
            <div class="block m-2"><i class="fa-brands fa-twitter fa-2x icon"></i></div>
            <div class="block m-2"><i class="fa-brands fa-linkedin fa-2x icon"></i></div>
            <div class="block m-2"><i class="fa-brands fa-youtube fa-2x icon"></i></div>
         </div>
         </div>
</div>
    </div>
</footer>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="{{url('js/jquery-3.6.1.min.js')}}"></script>
    <script src="{{url('js/bootstrap.bundle.js')}}"></script>
    <script src="{{url('js/wow.min.js')}}"></script>
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js" integrity="sha512-zMfrMAZYAlNClPKjN+JMuslK/B6sPM09BGvrWlW+cymmPmsUT1xJF3P4kxI3lOh9zypakSgWaTpY6vDJY/3Dig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{url('js/script.js')}}"></script>
    
     <script>
 new WOW().init();
 



</script>
</body>
</html>