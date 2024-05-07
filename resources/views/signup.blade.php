<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
  <title>Sign up</title>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-12 bg-white border-1 rounded-3 shadow-lg">
            <p class="mt-3 pb-2 border-bottom" style="color:crimson; font-size:20px;">Sign up</p>
            <h5 class="text-start" style="color:crimson;">The input field must contain between 6 to 20 letters or numbers And not Contain (space or any symbol)</h5>
            <form role="form" action="{{ route('signupform') }}" method="post">
                @csrf
                <br>
                <div class="input-group">
                    <input type="text" class="form-control user" placeholder="username" name="username">
                </div>
                <br>
                <div class="input-group">
                    <input type="password" class="form-control pass" placeholder="password" name="password">
                    <span class="input-group-text eye-icon"><i class="fa-sharp fa-solid fa-eye"></i></span>
                </div>
                <br>
                @if(session('warning'))
                    <div class="alert alert-warning text-dark p-2">{{session('warning')}}</div>
                    <br>
                @endif
                @if(session('failed'))
                    <input type="hidden" class="hidden" value="{{session('failed')}}">
                @endif
                <button class="btn login text-start mb-3" type="submit">Sign up</button>
            </form>
            @if(!Cookie::has('id'))
                <div class="mb-3">
                    <a href="{{ route('login') }}" style="color:crimson">Do you already have an account?</a>
                </div>
            @endif
        </div>
    </div>
</div>

<script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
<script>
    $(".user").keyup(function () {
        var user = $(".user").val()
        var lenuser = user.length
        if (lenuser > 20 || lenuser < 6) {
            $(".user").attr("style", "color:red;")
        }
        if (lenuser <= 20 && lenuser >= 6) {
            $(".user").attr("style", "color:black;")
        }
    })
    $(".pass").keyup(function () {
        var pass = $(".pass").val()
        var lenpass = pass.length
        if (lenpass > 20 || lenpass < 6) {
            $(".pass").attr("style", "color:red;")
        }
        if (lenpass <= 20 && lenpass >= 6) {
            $(".pass").attr("style", "color:black;")
        }
    })
    $(".eye-icon").click(function () {
        var eye = $(".pass").attr("type")
        if (eye == "password") {
            $(".pass").attr("type", "text")
        }
        if (eye == "text") {
            $(".pass").attr("type", "password")
        }
    })
    var hidden = $(".hidden").val()

    if (hidden == 2) {
        Swal.fire({
            position: 'top-',
            icon: 'error',
            title: 'Account registration failed',
            showConfirmButton: false,
            timer: 2000,
        })
    }
</script>
</body>
</html>