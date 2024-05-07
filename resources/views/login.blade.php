<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <title>Login</title>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-12 bg-white border-1 rounded-3 shadow-lg">

            <p class="mt-3 pb-2 border-bottom" style="color: crimson; font-size: 20px;">Login</p>

            <form role="form" action="{{ route('loginform') }}" method="post">
            @csrf
                <div class="input-group">
                    <input type="text" class="form-control user" placeholder="username" name="username">
                </div>
                <br>

                <div class="input-group">
                    <input type="password" class="form-control pass" placeholder="password" name="password">

                    <span class="input-group-text eye-icon"><i class="fa-sharp fa-solid fa-eye"></i></span>
                </div>
                <br>
              

                <button class="btn login text-start mb-3" type="submit">Login</button>
            </form>

            @if(Cookie::has('id'))
    <div class="mb-3">
        <a href="{{ route('signup') }}" style="color:crimson">If you don't have an account please click here</a>
    </div>
@endif


        </div>
    </div>
</div>

@if(session('failed'))
                    <input type="hidden" class="hidden" value="{{session('failed')}}">
                @endif

<script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
<script>
    $(".eye-icon").click(function () {
        var eye = $(".pass").attr("type")
        if (eye == "password") {
            $(".pass").attr("type", "text")
        }
        if (eye == "text") {
            $(".pass").attr("type", "password")
        }
    });

    var hidden = $(".hidden").val()

    if (hidden==2) {
        Swal.fire({
            position: 'top-top',
            icon:'error',
            title: 'Login failed',
            showConfirmButton: false,
            timer: 2000,

        })
    }
</script>
</body>
</html>