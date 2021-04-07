(function($) {
  "use strict"; // Start of use strict

  $(window).scroll(function() {
    var scroll = $(window).scrollTop();
    //if (scroll < 62) {
    //  $("#mainNav").addClass("new-menu");
    //}
    if (scroll >= 62) {
      $("#mainNav").addClass("new-menu");
    } else {
      $("#mainNav").removeClass("new-menu");
    }

  });

    var $fixed_block = $('.fixed_block'),
        $left = $fixed_block.offset().left,
        $top = $fixed_block.offset().top;
    $fixed_block.css({'left': '-'+$left+'px', 'top': '-'+$top+'px', 'display': 'none'});

  //Team Member Slider Script
  var team = $('.team-wrapper');
  team.owlCarousel({
    loop:true,
    autoplay:false,
    margin:15,
    nav:false,
    dots:true,
    responsive:{
      0:{
        items:1
      },
      768:{
        items:3
      },
      992:{
        items:3
      }
    }
  });
  $('.team-member_nav .testi_next').on('click', function() {
    team.trigger('next.owl.carousel');
  });

  $('.team-member_nav .testi_prev').on('click', function() {
    team.trigger('prev.owl.carousel');
  });

  //Testimonial Slider Script

  var testimonial = $('.testimonial-wrapper');
  testimonial.owlCarousel({
    loop:true,
    autoplay:false,
    margin:14,
    nav:false,
    dots:true,
    responsive:{
      0:{
        items:1
      },
      768:{
        items:2
      },
      992:{
        items:2
      }
    }
  });
  $('.testimonial_nav .testi_next').on('click', function() {
    testimonial.trigger('next.owl.carousel');
  });

  $('.testimonial_nav .testi_prev').on('click', function() {
    testimonial.trigger('prev.owl.carousel');
  });

    //Animated Search Button Script
    function search_btn_toggle(){
        $(".input").toggleClass("active").focus;
        $(this).toggleClass("animate");
        $(".input").val("");
        $('.fixed_block').toggle();
    }
    $(".search-btn, .fixed_block").click(function(){
        search_btn_toggle();
    });

    // Jquery counterUp
    $('.counter').counterUp({
        delay: 10,
        time: 3000
    });
    
    var body = $('body');
    
    $('[data-target="#myModal"]').on('click', function(){
            body.css('overflow', 'hidden');
            $('#myModal2').modal('hide');
        setTimeout(function(){
            body.addClass('modal-open').css('overflow', '');
        }, 500);
    });


})(jQuery); // End of use strict