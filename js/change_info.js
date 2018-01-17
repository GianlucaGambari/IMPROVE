'use script';

change_user();

function change_user() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("info-form").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "change_user.php", true);
  xhttp.send();
}


function change_pwd() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("info-form").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "change_pwd.php", true);
  xhttp.send();
}

function delete_user() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("info-form").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "delete_user.php", true);
  xhttp.send();
}
