<?php
  session_start();
  header('Content-type: text/css; charset:UTF-8');
?>

body, html {
  font-family: "Quicksand", sans-serif;
  background-color: #e6e6e6;
  height: 94%;
}


/* area.php */

.padded {
  height: 100%;
  margin-top: 100px;
}

.padded-google,#map {
  height: 100%;
  padding:0;
}
.padded-marker{
  height:90%
}
.search{
  width:100%;
  background:#777;
  height:10%;
}

.input-group{
  padding:2vh;
}

.clearfix {
  display: block;
  box-sizing: border-box;
}

.clearfix>a {
  color: black;
  background-color: white;
  border-bottom: solid 1px #E0E0E0;
  padding: 14px;
}

gliph{
  position:absolute;
}
.scroll{
  overflow-y:scroll;
}

div.report{
  padding:4%;
  height:18%
}
.modal-margin{
  margin:7px !important;
}

.message{
  position: fixed;
  z-index: 2;
  top: 46%;
  left: 42%;
  width:50%;
  box-shadow: 0px 0px 100px 1px black;
}

#message{
  font-size:30px;
}
.padded-footer {
  height: 25%;
  background: #616161;
  text-align: center;
}

.info-footer-reports {
  text-align: center;
  vertical-align: middle;
  font-size: 19px;
  color: #FFFFFF;
}

/*change_info_area_marker */

.back-page{
  text-align:left;
  height: 6%;
}

#back, #back:focus{
  color:black;
  font-size: 20px;
  text-decoration:none;
}

.carousel-inner > .item > img, .carousel-inner > .item > a > img {
  width: 100%;
  height: 30%;
}

.description {
  height: 30%;
  padding:10px 10px 10px;
  padding-right:10px;
}

.other-info{
  height:10%;
  padding:10px;
  font-size: 16px;
}

textarea {
  width: 100%;
  border:0px;
  resize:none;
  font-size:20px;
  background-color:#e6e6e6;
}

/*  info_user.php */

.navbar-inverse {
  border-color: #222;
}

.account {
  background-color: #222;
  height: 200px;
  text-align: center;
  width: 100%;
}

h1 {
  padding-top: 20px;
  color: white;
  margin-top: 100px;
}

.menu {
  padding-top: 50px;
  text-align: center;
}

.img-profile {
  margin: auto;
  width: 200px;
  height: 200px;
  border-radius: 50%;
  background-position: center;
  background-size: cover;
  background-image: url("../img/upload/<?php echo $_SESSION['img'] ?>");
}

.change {
  display: none;
  padding-top:25%;
}

.img-profile:hover {
  box-shadow: 0px 0px 100px 1px black;
  opacity: 0.6;
}

.img-profile:hover .change {
  display: block;
  cursor: pointer;
}

.button {
  margin-top: 5px;
  width: 50%;
  text-align: left;
}

.menu-info {
  padding-top: 60px;
  text-align: center;
}

.title {
  font-size: 30px;
}

.info {
  width: 50%;
  margin: auto;
}

.row-pad {
  margin-top: 47px;

}

.row-pad-delete {
  margin-top: 120px;
}

.row-pad-btn {
  margin-top: 75px;
  margin-bottom: 100px;
}


/*modal upload foto */
.modal-body{
  text-align: center !important;
}

.btn-upload {
  margin-top: 30px;
  margin-bottom: 30px;
  width: 80%;
}
