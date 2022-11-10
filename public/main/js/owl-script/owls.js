$(document).ready(function(){
    $('body.rtl #specials_owl').owlCarousel({
      items : 2,
      nav : true,
      dots : false,
      rtl : true,
      responsive: {
          320: {
            items: 1
          },
          481: {
            items: 1
          },
          768: {
            items: 1
          },
          992: {
            items: 2
          },        	
          1200: {
            items: 2
          }
        }
  });

  $('body:not(.rtl) #specials_owl').owlCarousel({
    items : 2,
    nav : true,
    dots : false,
    rtl : false,
    responsive: {
        320: {
          items: 1
        },
        481: {
          items: 1
        },
        768: {
          items: 1
        },
        992: {
          items: 2
        },        	
        1200: {
          items: 2
        }
      }
});

$(".special_next").click(function(){
  $("#specials_owl").trigger('next.owl');
});
$(".special_prev").click(function(){
  $("#specials_owl").trigger('prev.owl');
});


    $("body.rtl #newproduct_products_slider").owlCarousel({
        items : 2,
        nav : true,
        dots : false,
        rtl : true,
        responsive: {
            320: {
              items: 1
            },
            481: {
              items: 1
            },
            768: {
              items: 1
            },
            992: {
              items: 2
            },        	
            1200: {
              items: 2
            }
          }
    });

    

    $("body:not(.rtl) #newproduct_products_slider").owlCarousel({
      items : 2,
      nav : true,
      dots : false,
      rtl : false,
      responsive: {
          320: {
            items: 1
          },
          481: {
            items: 1
          },
          768: {
            items: 1
          },
          992: {
            items: 2
          },        	
          1200: {
            items: 2
          }
        }
  });

    
    $(".newproduct_next").click(function(){
       $("#newproduct_products_slider").trigger('next.owl');
    });
    $(".newproduct_prev").click(function(){
       $("#newproduct_products_slider").trigger('prev.owl');
    });

    $("body.rtl #deal-of-the-day").owlCarousel({
        items : 1,
        nav : true,
        dots : false,
        rtl : true,
        responsive: {
            320: {
              items: 1
            },
            481: {
              items: 1
            },
            768: {
              items: 1
            },
            992: {
              items: 1
            },          
            1200: {
              items: 1
            }
          }
    });

    $("body:not(.rtl) #deal-of-the-day").owlCarousel({
      items : 1,
      nav : true,
      dots : false,
      rtl : false,
      responsive: {
          320: {
            items: 1
          },
          481: {
            items: 1
          },
          768: {
            items: 1
          },
          992: {
            items: 1
          },          
          1200: {
            items: 1
          }
        }
  });

    
    $("#deal-next").click(function(){
       $("#deal-of-the-day").trigger('next.owl');
    });
    $("#deal-prev").click(function(){
       $("#deal-of-the-day").trigger('prev.owl');
    });


    

    $('body.rtl .block_content').owlCarousel({
        items : 4,
        nav : true,
        dots : false,
        rtl : true,
        responsive: {
            320: {
              items: 2
            },
            481: {
              items: 2
            },
            768: {
              items: 3
            },
            992: {
              items: 4
            },        	
            1200: {
              items: 4
            }
          }
    });

    $('body:not(.rtl) .block_content').owlCarousel({
      items : 4,
      nav : true,
      dots : false,
      rtl : false,
      responsive: {
          320: {
            items: 2
          },
          481: {
            items: 2
          },
          768: {
            items: 3
          },
          992: {
            items: 4
          },        	
          1200: {
            items: 4
          }
        }
  });

    $('body.rtl .testimonials_wrap').owlCarousel({
      items : 1,
      nav : true,
      dots : true,
      rtl : true,
      responsive: {
          320: {
            items: 1
          },
          481: {
            items: 1
          },
          768: {
            items: 1
          },
          992: {
            items: 1
          },        	
          1200: {
            items: 1
          }
        }
  });

  $('body:not(.rtl) .testimonials_wrap').owlCarousel({
    items : 1,
    nav : true,
    dots : true,
    rtl : false,
    responsive: {
        320: {
          items: 1
        },
        481: {
          items: 1
        },
        768: {
          items: 1
        },
        992: {
          items: 1
        },        	
        1200: {
          items: 1
        }
      }
});


    

    $("body.rtl .products-carousel").owlCarousel({
          items:4,
          nav : true ,
          dots : false,
          rtl : true,
          responsive: {
            320: {
              items: 1
            },
            481: {
              items: 1
            },
            768: {
              items: 2
            },
            992: {
              items: 2
            },        	
            1200: {
              items: 2
            }
          }

      });

      $("body:not(.rtl) .products-carousel").owlCarousel({
        items:4,
        nav : true ,
        dots : false,
        rtl: false,  
        responsive: {
          320: {
            items: 1
          },
          481: {
            items: 1
          },
          768: {
            items: 2
          },
          992: {
            items: 2
          },        	
          1200: {
            items: 2
          }
        }

    });

    $("body.rtl .tab-owl-ca").owlCarousel({
          items:4,
          nav : true ,
          dots : false,
          rtl: true, 
          responsive: {
            320: {
              items: 2
            },
            481: {
              items: 2
            },
            768: {
              items: 2
            },
            992: {
              items: 3
            },          
            1200: {
              items: 4
            }
          }

      });

      $("body:not(.rtl) .tab-owl-ca").owlCarousel({
        items:4,
        nav : true ,
        dots : false,
        rtl: false,  
        responsive: {
          320: {
            items: 2
          },
          481: {
            items: 2
          },
          768: {
            items: 2
          },
          992: {
            items: 3
          },          
          1200: {
            items: 4
          }
        }

    });

    
    $(".seller_next").click(function(){
       $(".tab-owl-ca").trigger('next.owl');
    });
    $(".seller_prev").click(function(){
       $(".tab-owl-ca").trigger('prev.owl');
    });



    


    var blogowlrtl = $("body.rtl .grid-blog-slider");
        $("body.rtl .grid-blog-slider").owlCarousel({
        items : 4 , //10 items above 1000px browser width
        loop: false,
        nav: true,  
        rtl: true, 
        dots: false,
        responsive: {
          100: {
            items: 1
          },
          543: {
            items: 2
          },
          992: {
            items: 3
          },
          1201: {
            items: 4
          }
        }
         });

   var blogowl = $("body:not(.rtl) .grid-blog-slider");
     $("body:not(.rtl) .grid-blog-slider").owlCarousel({
        items : 4 , //10 items above 1000px browser width
        loop: false,
        nav: true,  
        rtl: false,  
        dots: false,
        responsive: {
          100: {
            items: 1
          },
          543: {
            items: 2
          },
          992: {
            items: 3
          },
          1201: {
            items: 4
          }
        }
         });
      $('.grid--blog').each(function () { 
              if($(this).find('.owl-nav').hasClass('disabled')){
                $(this).find('.customNavigation').hide();
              }else{
                $(this).find('.customNavigation').show();
              }
            });
    $(".blog_next").click(function(){
       $(".grid-blog-slider").trigger('next.owl');
    });
    $(".blog_prev").click(function(){
       $(".grid-blog-slider").trigger('prev.owl');
    });
  });