@livewireScripts
<!-- latest jquery-->
 <script src="{{ asset('main/js/jquery-3.3.1.min.js') }}"></script>
 <script src="{{ asset('main/js/countdown/multi-countdown.js') }}"></script>
 <!-- menu js-->
 <script src="{{ asset('main/js/menu.js') }}"></script>

 <!-- lazyload js-->
 <script src="{{ asset('main/js/lazysizes.min.js') }}"></script>

 <!-- slick js-->
 <script src="{{ asset('main/js/slick.js') }}"></script>

 <!-- Bootstrap js-->
 <script src="{{ asset('main/js/bootstrap.min.js') }}"></script>
 <script src="{{ asset('main/js/popper.min.js') }}"></script>

 <!-- Bootstrap Notification js-->
 <script src="{{ asset('main/js/bootstrap-notify.min.js') }}"></script>
 <script src="{{ asset('main/js/jquery.elevatezoom.js') }}"></script>

 <script type="text/javascript" src="{{ asset('main/owl/owl.carousel.min.js') }}"></script>
 <script type="text/javascript" src="{{ asset('main/js/owl-script/owls.js') }}"></script>
 <!-- Theme js-->
 <script src="{{ asset('main/js/theme-setting.js') }}"></script>
 

 <script>
     function openSearch() {
         document.getElementById("search-overlay").style.display = "block";
     }

     function closeSearch() {
         document.getElementById("search-overlay").style.display = "none";
     }
 </script>
 <script src="{{ asset('main/js/script.js') }}"></script>
 
 <script src="{{ asset('main/js/swiper-bundle.min.js') }}"></script>

 <script type="text/javascript" src="{{ asset('main/js/swiper-script.js') }}"></script>
 <script type="text/javascript" src="{{ asset('main/js/sticky.min.js') }}"></script>
 
 <script type="text/javascript" src="{{ asset('main/js/loadingoverlay.min.js') }}"></script>
 <script type="text/javascript" src="{{ asset('main/js/cart/cart.js') }}"></script>
 <script type="text/javascript" src="{{ asset('main/js/category/perpage.js') }}"></script>
 <script type="text/javascript" src="{{ asset('main/js/sweetalert2.all.min.js') }}" ></script>
 <script>
    Livewire.on("deleteTriggered", (id) => {
        const proceed = confirm(`Are you sure you want to delete this product`);
    
        if (proceed) {
            Livewire.emit("removeFromCart", id);
        }
    });

    window.addEventListener("product-deleted", (event) => {
        alert(`product was deleted!`);
    });

    window.addEventListener('swal',function(e) {
      Swal.fire({
          title:  e.detail.title,
          text : e.detail.text,
          icon : e.detail.type,
      });
  });
  </script>
  <script>
  $(document).ready(function(){
    // Loop through each div element with the class box
    $(".myBar").each(function(){
        // Test if the div element is empty
        var duration = (Math.floor(Math.random() * 3) + 1) * 100000 ;
        $(this).animate({
            'width' : 0
        },duration);
    });
  });
  </script>
  
  @stack('custom-js')