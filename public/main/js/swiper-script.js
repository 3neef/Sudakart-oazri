const swiper = new Swiper('.swiper-best-slideshow', {
    slidesPerView: 1,
    spaceBetween: 10,
    // Optional parameters
    loop: true,

    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

    effect : 'fade',
    autoplay : true,

    
  });
const category = new Swiper('.brands',{
      autoplay: true,
      navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
      },
      
      // Default parameters
      slidesPerView: 5,
      spaceBetween: 10,
      loop : true,
    
    // Responsive breakpoints
      breakpoints: {
          // when window width is <= 1200px
          1200: {
            slidesPerView: 4
          },
          // when window width is <= 991px
          991: {
            slidesPerView: 4
          },
          // when window width is <= 767px
          767: {
            slidesPerView: 3
          },
          // when window width is <= 480px
          480: {
            slidesPerView: 2
          }
     }

});




$('.tools-product-4').slick({
infinite: true,
speed: 300,
slidesToShow: 4,
slidesToScroll: 4,
autoplay: true,
autoplaySpeed: 5000,
responsive: [{
  breakpoint: 1200,
  settings: {
      slidesToShow: 3,
      slidesToScroll: 3
  }
},
{
  breakpoint: 767,
  settings: {
      slidesToShow: 2,
      slidesToScroll: 2
  }
}
]
});