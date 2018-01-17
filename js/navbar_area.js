'use strict';

$(document).ready(function() {
  if(location.pathname.split("/")[2] == "area.php" || location.pathname.split("/")[2] == "user_info.php" || location.pathname.split("/")[2] == "chat.php"){
    $("#navbar-area").delay(0).fadeIn(0);
    $("#navbar-home").fadeOut(0);
  }
  else  {
    $("#navbar-home").delay(0).fadeIn(0);
    $("#navbar-area").fadeOut(0);
  }
});


$(document).ready(function() {
  if(location.pathname.split("/")[2] == "area.php" || location.pathname.split("/")[2] == "user_info.php" || location.pathname.split("/")[2] == "chat.php"){
    $(".navbar-brand").attr("href", "area.php");
  }
});
