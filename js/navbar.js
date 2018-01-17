'use strict';

//scroll to correct href

$(document).ready(function() {

  $('nav a').click(function() {
    var $href = $(this).attr('href');
    $('body, html').stop().animate({
      scrollTop: $($href).offset().top
    }, 1000);
    return false;
  });

});

//change class active in navbar without scroll

$(document).ready(function() {
  $('.nav li a').click(function(e) {

    $('.nav li').removeClass('active');

    var $parent = $(this).parent();
    if (!$parent.hasClass('active')) {
      $parent.addClass('active');
    }
    e.preventDefault();
  });
});

//change size at navbar with scroll

$(document).scroll(function() {

  if (location.pathname.split("/")[2] == '' || location.pathname.split("/")[2] == "index.php") {
    var scrollPos = $(document).scrollTop();
    if (scrollPos > 50) {
      $('nav').removeClass('large');
      $('nav').addClass('small');
    } else {
      $('nav').removeClass('small');
      $('nav').addClass('large');
    }
  }
});

/*  hide element in collapse

$(document).ready(function(){
  $('.nav li .separator').collapse({
    toggle: false
  });
}); */


/*redirect href if page different from index.php*/

$(document).ready(function() {

  if (location.pathname.split("/")[2] == "login.php") {

    if (location.href.split("=")[1] == "login") {

        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active-login');
        $('#login-form-link').addClass('active-login');

      }else {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active-login');
        $('#register-form-link').addClass('active-login');

      }
  }

  if (location.pathname.split("/")[2] != '' && location.pathname.split("/")[2] != "index.php") {
    $('#homepage').attr("href", "index.php");
    $('#page-about').attr("href", "about.php");
    $('#page-reports').attr("href", "reports.php");
    $('#page-contact').attr("href", "contact.php");
  }


});

/*change class active depending url*/

$(function() {
  
    $('.nav li').removeClass('active');
    if (location.href.split("=")[1] == "login") {
      $('.nav .link-login').addClass('active');
    }
    else if (location.href.split("=")[1] == "register") {
      $('.nav .link-register').addClass('active');
    }
    else if (location.pathname.split("/")[2] == '' || location.pathname.split("/")[2] == "index.php" ){
      $('.homepage').addClass('active');
    }
    else  {
      $('.nav li a[href^="' + location.pathname.split("/")[2] + '"]').parent().addClass('active');
    }
  });


/*change class active with scroll*/

$(document).scroll(function() {
  if (location.pathname.split("/")[2] == '' || location.pathname.split("/")[2] == "index.php" ) {
    var scrollPos = $(document).scrollTop();
    if (scrollPos < 547) {
      $('.nav li').removeClass('active');
      $('.nav .homepage').addClass('active');
    } else if (scrollPos >= 547 && scrollPos < 1307) {
      $('.nav li').removeClass('active');
      $('.nav .about').addClass('active');
    } else if (scrollPos >= 1307 && scrollPos < 2534) {
      $('.nav li').removeClass('active');
      $('.nav .reports').addClass('active');
    } else {
      $('.nav li').removeClass('active');
      $('.nav .contact').addClass('active');
    }
  }
});
