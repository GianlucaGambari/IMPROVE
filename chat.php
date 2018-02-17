<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link rel="icon" href="img/img.png" type="image/png">
  <link rel="stylesheet" href="Bower/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="css/navbar.css" />
  <link rel="stylesheet" href="css/chat.css" />
</head>


<body>
  <?php
    include 'database/check_cookie.php';
    include_once('navbar.php');
  ?>

  <!--<div class ="chat-title">
     <div class="container-fluid" >
       <h1> Chat </h1>
     </div>
   </div>-->

   <div class="container all-info" style="margin-top:120px">

     <div style="height:100%; margin:0;">
       <!-- markers -->
       <div class="list-group">

         <div class="div-search">
           <div class="inner-addon right-addon">
             <i class="glyphicon glyphicon-search"></i>
             <input type="text" class="form-control" placeholder="Search" onkeyup="showMarker(this.value)"/>
           </div>
         </div>

         <ul class="markers" id="show-marker"></ul>

      </div>

       <!-- chat -->
      <div class="mex">

        <div class="info-marker" id="info-marker">
          <div class="info-marker" id="info-marker-no-btn"></div>
          <button type="button" class="menu-search btn btn-sm" data-toggle="toggle" data-target=".list-group" style="float: right; margin: 1%; display:none">
            <i class="glyphicon glyphicon-option-vertical"></i>
          </button>
        </div>

        <div class="all-messages" id="all-messages">
          <img src="img/improve-chat.png" style="max-width:100%; height:100%; padding-left:15%;"/>
        </div>

        <div class="chat-message send-mex">
          <span><textarea name="message-to-send" id="message-to-send" placeholder ="Write your message..." rows="1"></textarea></span>
          <buttom class="btn glyphicon glyphicon-send"></buttom>
        </div>
      </div>

    </div>

  </div>

  <script src="Bower/jquery/jquery-3.2.1.min.js"  type="text/javascript">></script>
  <script src="Bower/bootstrap/js/bootstrap.min.js"></script>
  <script src="Bower/parallax.js/parallax.min.js"></script>
  <script type="text/javascript" src="js/navbar_area.js" ></script>

  <script>
  function clean_str(str){
        str=str.replace(/è/gi,'e\'');
        str=str.replace(/é/gi,'e\'');
        str=str.replace(/ò/gi,'o\'');
        str=str.replace(/ù/gi,'u\'');
        str=str.replace(/ì/gi,'i\'');
        str=str.replace(/à/gi,'a\'');
        return str;
  }
  $(document).ready(function (){
    $("[data-toggle='toggle']").click(function() {
      var selector = $(this).data("target");
      $(selector).toggleClass('in');
      if ($(".list-group").hasClass("in")) {
        $("#name-marker").css("display", "none");
      }
      else {
        $("#name-marker").css("display", "block");
      }
    });
  });

  var variable="";
  showMarker(variable);

  function showMarker(str) {

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("show-marker").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","database/chat_marker.php?q="+str,true);
    xmlhttp.send();

  }

  function change_marker(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("all-messages").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "database/change_marker.php?id="+id, true);
    xhttp.send();
  }

  function info_marker(idmarker) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("info-marker-no-btn").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "database/info_marker.php?id="+idmarker, true);
    xhttp.send();
  }

  Date.prototype.toMysqlFormat = function () {
    function pad(n) { return n < 10 ? '0' + n : n }
    return this.getFullYear() + "-" +
            pad(1 + this.getMonth()) + "-" +
            pad(this.getDate()) + " " +
            pad(this.getHours()) + ":" +
            pad(this.getMinutes()) + ":" +
            pad(this.getSeconds());
  };

  var idmarker = 0;

  function getIdMarker (id){
    idmarker= id;
  }
  $(document).ready(function (){
    $(".glyphicon-send").click(function(){
      var date = new Date().toMysqlFormat();
      var text = clean_str($("#message-to-send").val());
      if (text.length != 0 && idmarker !=0) {
        $.ajax({
          type: "GET",
          url: "database/send_messages.php" ,
          data: { user: "<?php echo $username ?>", idmarker: idmarker, text: text, date: date },
          success : function() {
            $("#no-messages").addClass("hide");
            control = '<div class="message my-message">' +
                        '<p>'+ text +'</p>' +
                        '<p><small style="float:right">'+date+'</small></p>' +
                    '</div>';
            $("#all-messages").append(control);
            $("#message-to-send").val('');
          }
        });
      }
    });
  });

  </script>

</body>
</html>
