'use strict'

var map, infoclientpos, marker, infoWindow;
var ERRSTRING = "<strong>Error! </strong>";
var SUCCSTRING ="<strong>Success! </strong>";
var HIDEMARKER = true;
var lat0=44;
var lng0=8;
var lat1=45;
var lng1=9;
function clean_str(str){
      str=str.replace(/è/gi,'e\'');
      str=str.replace(/é/gi,'e\'');
      str=str.replace(/ò/gi,'o\'');
      str=str.replace(/ù/gi,'u\'');
      str=str.replace(/ì/gi,'i\'');
      str=str.replace(/à/gi,'a\'');
      return str;
}


var variable="";
var str ="";
if(location.pathname.split("/")[2] == "area.php") marker_in_area(variable);

function back_in_area(){
  location.reload();
}

function marker_in_area(str){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("marker_in_area").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "database/marker_in_area.php?q="+str, true);
  xhttp.send();
}

function change_info_area_marker(idmarker) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("info-area-marker").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "database/change_info_area_marker.php?idmarker="+idmarker, true);
  xhttp.send();
}


function name_marker(string){
  str = string;
}

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {
      lat: 44.4029887,
      lng: 8.9726596
    },
    zoom: 16
  });
  infoclientpos = new google.maps.InfoWindow;
  infoWindow=new google.maps.InfoWindow;
  google.maps.event.addListener(map, 'bounds_changed', function() {
      lat1 = map.getBounds().getNorthEast().lat();
      lng1 = map.getBounds().getNorthEast().lng();
      lat0 = map.getBounds().getSouthWest().lat();
      lng0 = map.getBounds().getSouthWest().lng();
      var arl='database/downloadreport.php?lat0=' + lat0 + '&lat1=' + lat1 +  '&lng0=' + lng0 + '&lng1=' + lng1 + "&str=" + str ;
      downloadUrl(arl,null, function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName('marker');
        Array.prototype.forEach.call(markers, function(markerElem) {
          var point = new google.maps.LatLng(
              parseFloat(markerElem.getAttribute('lat')),
              parseFloat(markerElem.getAttribute('lng')));
          var infowincontent = document.createElement('div');
          var strong = document.createElement('strong');
          strong.textContent = markerElem.getAttribute('name');
          infowincontent.appendChild(strong);
          infowincontent.appendChild(document.createElement('br'));

          var text = document.createElement('text');
          text.textContent = markerElem.getAttribute('address');
          infowincontent.appendChild(text);

          var marker = new google.maps.Marker({
            map: map,
            position: point,
          });
          marker.addListener('click', function() {
            infoWindow.setContent(infowincontent);
            infoWindow.open(map, marker);
            var id=markerElem.getAttribute('idmarker');
            change_info_area_marker(id);
          });

        });
      },false);
    });
  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      infoclientpos.setPosition(pos);
      infoclientpos.setContent('You are Here!');
      infoclientpos.open(map);
      map.setCenter(pos);
    }, function() {
      handleLocationError(true, infoclientpos, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoclientpos, map.getCenter());
  }
  if(location.pathname.split("/")[2] == "area.php"){
    google.maps.event.addListener(map, 'click', function(event) {
      marker = new google.maps.Marker({
        position: event.latLng,
        map: map
      });
      $('#insert').modal('show');
    });
  }
}

function handleLocationError(browserHasGeolocation, infoclientpos, pos) {
  infoclientpos.setPosition(pos);
  infoclientpos.setContent(browserHasGeolocation ?
    'Error: The Geolocation service failed. Try with HTTPS' :
    'Error: Your browser doesn\'t support geolocation.');
  infoclientpos.open(map);
}
function bad(message){
    $('#insert').modal('hide');
    HIDEMARKER=true;
    marker.setMap(null);
    $('#message').empty();
    $('#message').append(ERRSTRING+message);
    $('.message').removeClass('alert-success');
    $('.message').addClass('alert-danger');
    $('.message').removeClass('hide');
    return false;
}
function saveData() {
  $('.message').addClass('hide');
  var reportname=clean_str($('#reportname').val());
  var description=clean_str($("#description").val());
  var reportcity=clean_str($('#reportcity').val());
  var reportaddress=clean_str($('#reportaddress').val());

  if(reportname.length===0){
      bad("Please insert report name");
      return false;
    }
  if(description.length===0){
      bad("Please insert description");
      return false;
    }
  if(reportaddress.length===0){
      bad("Please insert address");
      return false;
    }
  if(reportcity.length===0){
      bad("Please insert city");
      return false;
    }
  var fd=new FormData();
  var x=document.getElementById("fileToUpload");
  for(var i=0;i<x.files.length;i++)
         fd.append(i.toString(),x.files[i]);
  reportname=escape(reportname);
  description=escape(description);
  reportaddress=escape(reportaddress);
  reportcity=escape(reportcity);

  var latlng = marker.getPosition();
  var url = 'database/uploadreport.php?lat=' + latlng.lat() + '&lng=' + latlng.lng() + '&reportname='+reportname + '&description='+description+"&address="+reportaddress+"&city="+reportcity;

  downloadUrl(url,fd, function(data, responseCode) {
    if (responseCode == 200 && data.length <= 1) {
        $('#insert').modal('hide');
        HIDEMARKER=false;
        $('#message').empty();
        $('#message').append(SUCCSTRING);
        $('.message').removeClass('alert-danger');
        $('.message').addClass('alert-success');
        $('.message').removeClass('hide');
        return false;
    };

    bad("Error: Internal Server Error");
    return false;

  },true);
}

$(document).ready(function(){
    $(".close").click(function(){
        $("#message").empty();
        $(".message").addClass('hide');
    });
});

function downloadUrl(url,fd,callback,upload) {
  var request = window.ActiveXObject ?
    new ActiveXObject('Microsoft.XMLHTTP') :
    new XMLHttpRequest;

  request.onreadystatechange = function() {
    if (request.readyState == 4) {
      request.onreadystatechange = doNothing;
      if(upload)
        callback(request.responseText, request.status);
      else
        callback(request, request.status);

    }
  };
  if(upload){
      request.open('POST', url, true);
      request.send(fd);
    }
  else{
      request.open('GET', url, true);
      request.send(null);

  }
}

function doNothing() {
  return false;
}


$('#insert').on('hidden.bs.modal',function(){
  if (HIDEMARKER)
    marker.setMap(null);
  HIDEMARKER=true;
});
