@extends('layout')
@section('title','Contact')
@section('content')
<header class="position-relative">
    <img src="{{url('slider-images/contact4.jpg')}}"  alt="">
    <div class="header-text"> Contact With Us</div>
</header>
<div class="container">
    <div class="row justify-content-center">

        
    <div class="col-12 my-5 h5 contact-heading"></div>
        
        <div class="col-md-6">
        <h3 class=" my-1" style="color:crimson;">Send Your Message</h3>
            <form class="my-3 contact-form">
            <input type="text"placeholder="Full-name" name ="name" class="form-control my-3 name shadow" style="border:1px solid crimson;">
            <div class="name-err"></div>
<input type="text" name ="number" placeholder="Phone-Number" class="form-control my-3 number shadow" style="border:1px solid crimson;">
<div class="number-err"></div>
<input type="text" name ="email"placeholder="Email-Address" class="form-control my-3 email shadow" style="border:1px solid crimson;">
<div class="email-err"></div>
<textarea name="message"  class="w-100 my-3 message shadow" style="height:350px; border:1px solid crimson; border-radius:5px; "></textarea>
<div class="message-err"></div>
<button type="submit" class="btn login contact my-3">Send</button>
            </form>

        </div>
        <div class="col-md-6 mt-lg-5 mt-md-5 mt-sm-3 ">
            
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54818.98311758633!2d30.853949512746667!3d30.825441490713175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f6341127dd6609%3A0x643974f80e7b89f0!2z2YPZgdixINin2YTYstmK2KfYqtiMINmF2K_ZitmG2Kkg2YPZgdixINin2YTYstmK2KfYqtiMINmF2LHZg9iyINmD2YHYsSDYp9mE2LLZitin2KrYjCDYp9mE2LrYsdio2YrYqQ!5e0!3m2!1sar!2seg!4v1683999881914!5m2!1sar!2seg" height="538" style="border:0; width:100%; border-radius:10px; margin-bottom:50px !important;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
 
     
    </div>
</div>
</div>
@endsection