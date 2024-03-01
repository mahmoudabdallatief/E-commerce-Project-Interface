$(document).ready(function(){
//  $("html").niceScroll();
const pathParts = window.location.pathname.split("/");
if (
    window.location.pathname === '/' ||
    (pathParts.length > 2 && pathParts[1] === "category")
  )  {
        $(".navContainer").attr("style","margin-top:-110px;")
        $(".home").addClass("active")
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 80) {
                $(".navbar").css({"background-color":"crimson"});   
            } else {
                $(".navbar").css({"background-color":"transparent"});
            }
        });
    }
    else{
        $(".navbar").attr("style","background-color:crimson")
    }
   

var swiper1 = new Swiper('.slide-con', {
    // Optional parameters
    loop: true,
    // Navigation arrows
    navigation: {
        nextEl: '.sli-next',
        prevEl: '.sli-prev',
    },
  
    autoplay: {
        delay: 5000,
    },
    scrollbar: {
        el: '.swiper-scrollbar',
      },
  
  });
  
  var session= $(".session").val()
  if(session){
      Swal.fire({
          position: 'top-top',
          icon: 'success',
          title: 'HELLO <span>'+session+'</span><br><br>Login completed successfully',
          showConfirmButton: false,
          timer: 2000,
      
        })
  }
  
// function typewriter(element, text, delay = 300) {
//   for (let i = 0; i < text.length; i++) {
//     setTimeout(() => {
//       element.innerHTML += text[i];
//     }, delay * i);
//   }
// }

// const el = document.getElementById("typewriter");
// typewriter(el, "E-commerce Website");

var date= $(".date").val();
if(date){
    var timer = setInterval(function(){
        var countdate = new Date(date).getTime();
        var currentdate = new Date().getTime();
        var counter = countdate - currentdate
        var days = Math.floor(counter/(1000*60*60*24));
        var hours = Math.floor(counter%(1000*60*60*24)/(1000*60*60))
        var minutes =Math.floor(counter%(1000*60*60)/(1000*60))
        var seconds = Math.floor(counter%(1000*60)/(1000))
        
    document.getElementById("days").innerHTML=(days) < 10 ? `0${days}`:days;
    document.getElementById("hours").innerHTML=(hours)< 10 ? `0${hours}`:hours;
    document.getElementById("minutes").innerHTML=(minutes)< 10 ? `0${minutes}`:minutes;
    document.getElementById("seconds").innerHTML=(seconds)<10 ?`0${seconds}` :seconds;
    
    // the end of count down
    if(seconds<0){
        clearInterval(timer);
        // document.getElementById("count").style.display="none";
        document.getElementById("finish").innerHTML=("<p class=' text-center' style='font-size:24px'>The offer is finished</p>");
    
      }
    }
    ,1000)
}



$(".comm").click(function() {
    var pro = $(".pro").val();
    var message = $(".message").val();
   
    $.ajax({
        url: '/addcomment',
        method: 'POST',
        data: {
            pro: pro,
            message: message,
        },
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
        },
        success: function(data) {
            $(".comment-con").load(location.href + "  .comment");
            // $(".num-row").hide();
            Swal.fire({
                position: 'top-top',
                icon: 'success',
                title: data.success,
                showConfirmButton: false,
                timer: 2000,
            });
        },
        error: function(data) {
            Swal.fire({
                position: 'top-top',
                icon: 'info',
                title: data.responseJSON.error,
                showConfirmButton: false,
                timer: 2000,
            });
        }
    });
});
$(document).on("click", ".update", function() {
    var update= $(this).siblings(".inp-update").val()
    var message= $("#m"+update+"").val()

    $.ajax({
        url : '/updatecomment',
        type : 'POST',
        data :{
            update:update,
            message:message
        },
        dataType: 'html',
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
        },
        success: function(data){
            if(data == 2){
                Swal.fire({
                    position: 'top-top',
                    icon: 'info',
                    title: 'Empty Input Data',
                    showConfirmButton: false,
                    timer: 2000,
                });
            } else {
                var d = JSON.parse(data);
                $("#p" + update).html(d.comment);
                $("#i" + update).html(d.comment);
                $("#m" + update).html(d.comment);

                var date_update = d.date;
                var date1 = new Date(date_update);
                var options = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: '2-digit',
                    minute: 'numeric',
                    second: 'numeric'
                };
                var textWithDayName = date1.toLocaleString('en-US', options);
                $("#s" + update).html("( " + textWithDayName + " )");

                Swal.fire({
                    position: 'top-top',
                    icon: 'success',
                    title: 'The comment has been updated successfully',
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
        },
        
    });
});
  $(document).on("click", ".delete", function() {
    var deleterow = $(this).attr("data-delete")
    var pro= $(this).siblings(".pro").val() 
    
    $.ajax({
        url : '/deletecomment',
        method : 'POST',
        data :{
          delete:deleterow,
          pro:pro,
        },
        dataType: 'html',
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
        },
        success: function(data){
            $(".comment-con").load(location.href + "  .comment");
            var d = JSON.parse(data)
            console.log(data)
            $("#c"+deleterow+"").fadeOut()
               Swal.fire({
                   position: 'top-top',
                   icon: 'success',
                   title: 'The comment has been deleted successfully',
                   showConfirmButton: false,
                   timer: 2000,
               
                 })
           if( d.num ==0){
            $(".comment").html('<p class="text-center mb-5 h5 num-row" style="color:crimson; ">There is No Comment For This Product</p>')
           }
          
           
        }
        })
  })
$(".star").hover(function(){
    $(this).attr("style","color:gold;")
    $(this).prevAll(".star").attr("style","color:gold;")
    $(this).nextAll(".star").attr("style","color:#fff;")
})


  $(".star").click(function(){
    var pro= $(".product_id").val()
    var index = $(this).attr("data-index");
    $(this).attr("style","color:gold;")
    $(this).prevAll(".star").attr("style","color:gold;")
    $(this).nextAll(".star").attr("style","color:#fff;")
    $.ajax({
        url : '/update_rating',
        method : 'POST',
        data :{
            pro_id:pro,
           index:index
        },
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
        },
        success: function(data){ 
            $(".rate").load(location.href + "  .rate-display")
        }

        })
  })
  $(".small_img").click(function(){
    $(".small_img").removeClass("gallery");

$(this).addClass("gallery")

})
$(".small_img").hover(function(){
    $(".small_img").removeClass("gallery");

$(this).addClass("gallery")

})
$(".small_img").hover(function(){
    $(".big_img").attr('src', $(this).attr('src'
    ))
 })

 $(".small_img").click(function(){
    $(".big_img").attr('src', $(this).attr('src'
    ))

 })
// $(".star").mouseleave(function(){
//     $(this).attr("style","color:#fff;")
//     $(this).prevAll(".star").attr("style","color:#fff;")
//     $(this).nextAll(".star").attr("style","color:#fff;")
// })

// Get the button:
let mybutton = document.querySelector(".myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 25 || document.documentElement.scrollTop > 25) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera

}
topFunction();

        
            $('.dec-btn').click(function () {
            
                var siblings = $(this).siblings('.num');
                if (parseInt(siblings.val(), 10) > 1) {
                    siblings.val(parseInt(siblings.val(), 10) - 1);
                }
            });
      
            $('.inc-btn').click(function () {
             
                    var siblings = $(this).siblings('.num');
                    var num =$(this).siblings('.num').val();
                    var max = $(this).siblings('.max').val();
                    if(+max>+num){
                       
                siblings.val(parseInt(siblings.val())+1);
                
                
                }
            });
        

            $(".send").click(function(){

                var quantity = $(this).siblings(".num").val()
                var price =$(this).siblings(".price").val()
                var id1 =$(this).siblings(".id").val()
               
                var send =$(this).siblings(".send").html()
                    $.ajax({
                        url : '/updateacart',
                        method : 'POST',
                        data :{
                            quantity:quantity,
                            price:price,
                            id:id1,
                            action:send
                        },
                        dataType: 'html',
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
        },
                        success: function(data){
                         console.log(data)
                         var d= JSON.parse(data)
                         console.log(d)
                        
                        $("#a"+id1+"").html("<b class='text-light'>Total :</b> "+d.total+" $.")
                            $(".tot").html(d.sum+" $.")
                        
            
                          
                        }
                    
                    })
           })
           $(".btn-del").click(function(){
            var delid = $(this).siblings(".delid").val();
            console.log(delid);
            $.ajax({
                url: '/deletefromcart',
                type: 'POST',
                data: {
                    delid: delid
                },
                dataType: 'html',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                },
                success: function(dt){
                    console.log(dt);
                    $("#h"+delid).fadeOut();
                    var dis = JSON.parse(dt);
                    $(".tot").html(dis.sum+" $.");
                    if(dis.sum == null){
                        $(".tot").html("0 $"+".");
                    }
                    $("#co").html(dis.count+ ' <i class="fa-solid fa-cart-shopping   d-inline-block"></i>');
                    if(dis.count == 0){
                        $(".cart-con").html('<p class="text-center w-100 p-3" style="background-color:crimson; color:gold;border-radius:25px;box-shadow: 1px 1px 5px #969191fa, -1px -1px 5px #969191fa;border:1px solid gold;">No Products Added To Cart</p>');
                        $(".delall").hide();
                        $(".coupon-item").html(" <br><br><br>")
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
        $(".contact-form").submit(function(e){
            e.preventDefault();
            var name =$(".name").val();
            var number =$(".number").val();
            var email =$(".email").val();
            var message =$(".message").val();
        
            $.ajax({
                url: "/addmessage",
                type: "POST",
                data: {
                    name: name,
                    number: number,
                    email: email,
                    message: message,
                },
                dataType: "json",
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            position: 'top-top',
                            icon: 'success',
                            title: 'The message has been sent successfully',
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        $(".name").val("");
                        $(".email").val("");
                        $(".number").val("");
                        $(".message").val("");
                        $(".name-err").html("");
                        $(".number-err").html("");
                        $(".message-err").html("");
                        $(".email-err").html("");
                    } else {
                        if (response.errors.hasOwnProperty('name')) {
                            $(".name-err").html('<div class="alert alert-danger text-danger p-2">' + response.errors.name[0] + '</div>');
                        } else {
                            $(".name-err").html("");
                        }
                        if (response.errors.hasOwnProperty('number')) {
                            $(".number-err").html('<div class="alert alert-danger text-danger p-2">' + response.errors.number[0] + '</div>');
                        } else {
                            $(".number-err").html("");
                        }
                        if (response.errors.hasOwnProperty('email')) {
                            $(".email-err").html('<div class="alert alert-danger text-danger p-2">' + response.errors.email[0] + '</div>');
                        } else {
                            $(".email-err").html("");
                        }
                        if (response.errors.hasOwnProperty('message')) {
                            $(".message-err").html('<div class="alert alert-danger text-danger p-2">' + response.errors.message[0] + '</div>');
                        } else {
                            $(".message-err").html("");
                        }
                    }
                },
                error: function() {
                    alert("An error occurred while submitting the form.");
                }
            });
        });
        $('#checkout-Form').submit(function(event) {
            event.preventDefault(); // Prevent form submission
            
            // Clear previous validation errors
            $('.is-invalid').removeClass('is-invalid');
            $('.invalid-feedback').empty();
            
            // Serialize form data
            var formData = $(this).serialize();
            
            // Submit the form using AJAX
            $.ajax({
              url: "/checkout",
              type: 'POST',
              data: formData,
              beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
            },
              success: function(response) {
                // Handle successful response
                // Redirect to the desired page
                window.location.href = response.redirect_url;
              },
              error: function(xhr) {
                // Handle error response
                if (xhr.status === 422) {
                  var errors = xhr.responseJSON.errors;
                  $.each(errors, function(field, messages) {
                    $('#' + field).addClass('is-invalid');
                    var errorContainer = $('#' + field).find('.invalid-feedback');
                    if(errorContainer.length === 0){
                      errorContainer = $('<span class="invalid-feedback" ></span>');
                      $('#' + field).after(errorContainer);
                    }
                    errorContainer.html('');
                    $.each(messages, function(index, message) {
                      errorContainer.append('<span style =" color:#dc3545 !important">' + message + '</span>');
                    });
                  });
                } else {
                  console.log(xhr.responseText);
                }
              }
            });
          });

          function image(im) {
            const imageParts = im.split(",");
            return imageParts[0]; // Return the first part directly
          }
          

        $('#search-query').keyup(function() {
            var search_query = $(this).val();
            $('#search-results').attr("style", "display:block; ")
            $.ajax({
              type: 'POST',
              url: '/searchresult',
              data: {search_query: search_query},
              dataType: 'JSON',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                },
              success: function(data) {
                console.error()
                $('#search-results').empty();
                if (data.length > 0) {
                  $.each(data, function(i, result) {
                    var text = result.name;
                    var length = 35;
                    
                    var truncatedText = text.slice(0, length);
                    $('#search-results').append('<li class="list-search w-100"><a href="/single/' + result.id + '" class="text-decoration-none search-link" style="color:#fff;"><span> - </span><img src="/images/'+image(result.cover)+'" width ="70" height="70" class="circle"> ' + truncatedText + '<span><a href="/category/'+result.cat_id+'" class="text-decoration-none search-link" style="color:gold;">(' + result.cat + ')</a> </span></a></li>');
                  });
                } if(data.length == 0) {
                  $('#search-results').html('<li class="list-search text-center w-100">No Results Found</li>');
                }
              },
            //   error: function(xhr, status, error) {
            //     alert(xhr.responseText);
            //   }
            });
          
            if (search_query == '') {
              $('#search-results').attr("style", "display:none;")
            }
          });
      
 })

 