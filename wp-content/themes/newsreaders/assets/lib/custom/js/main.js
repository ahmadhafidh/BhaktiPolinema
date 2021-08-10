
(function (e) {
  "use strict";
  var n = window.NR_JS || {};
  n.stickyHeader = function () {
    var stickyNav = document.getElementById("sticky-nav-menu");
    var navbar = document.getElementById("navigation");
    if( e('div').hasClass('nr-navigation-section') && e('div').hasClass('sticky-nav-menu') ){
      var sticky = stickyNav.offsetTop;
      if (window.pageYOffset > sticky) {
          navbar.classList.add("sticky");
      }else{
        navbar.classList.remove("sticky");
      }
    }
  },
//progress bar
n.progressBar = function () {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  var progressBarId = document.getElementById("progressbar");
  if( e('div').hasClass('nr-progress-bar')){
    progressBarId.style.width = scrolled + "%";
  }
  
},
n.stickyScroll = function () {
    var header = document.getElementById("site-header");
    var sticky = header.offsetTop;
    var scrollUp = e("#scroll-top");
    var footerHeight = e("#site-footer").outerHeight();
    if (window.pageYOffset > sticky) {
      scrollUp.addClass("show");
    } else {
      scrollUp.removeClass("show");
    }
};
n.stickyScrollClick = function () {
  e('#scroll-top').on('click', function(event) {
    e("html, body").animate({
      scrollTop: 0
    }, 700);
    return false;
  });
};
n.slider = function() {
  e(".nr-breaking-news-slider").slick({
    speed: 3000,
    autoplay: true,
    autoplaySpeed: 0,
    cssEase: 'linear',
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: true,
    swipeToSlide: true,
    centerMode: true,
    focusOnSelect: true,
    dots: false,
    arrows: false,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
  });
  e(".nr-customizer-breaking-news-slider").slick({
    speed: 1000,
    autoplay: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    infinite: true,
    dots: false,
    arrows: true,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
  });
  // banner slider
  $(".nr-banner-vertical-slider").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: false,
    vertical: true,
    prevArrow: $('.banner-arrow-prev'),
    nextArrow: $('.banner-arrow-next'),
  });
  $(".nr-single-slider").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      arrow: true,
      autoplay: true
  });
  //carousel slider
  $(".nr-carousel-slider").slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: true,
      dots: true,
      arrow: true,
      responsive: [
          {
            breakpoint: 750,
            settings: {
              slidesToShow: 2,
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
            }
          }
  ]
  });
  // widget slider
  $(".nr-widget-post-slider").slick({
      slidesToShow: 1,
      SlidesToScroll: 1,
      dots: false,
      arrows: false,
      asNavFor: '.nr-widget-post-pagination',
      // autoplay: true
  });
  // widget pagination slider
  $(".nr-widget-post-pagination").slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      dots: false,
      arrows: false,
      vertical: true,
      asNavFor: '.nr-widget-post-slider',
      focusOnSelect: true,
      // autoplay: true
  });
}
e(window).on('load', function () { 
  e('#loader').fadeOut(); 
  e('#preloader').delay(350).fadeOut('slow');  
  e('body').delay(350).css({ 'overflow': 'visible' });
});
 e(document).ready(function () {
    n.slider(),
    n.stickyScrollClick();
});

e(window).scroll(function () {
  n.stickyHeader(),
  n.progressBar();
  n.stickyScroll();
});
})(jQuery);