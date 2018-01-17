

<nav class="navbar navbar-inverse navbar-fixed-top large" role="">

  <div class="navbar-header page-scroll">
    <button type="button" class="navbar-toggle collapsed " data-toggle="collapse" data-target="#navbar, #navbar_area">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
    <a class="navbar-brand" href="index.php">
          <img src="img/logo.png" alt="logo">
        </a>
  </div>

  <form id="navbar-home" style="display: block">
    <div id="navbar" class="mynavbar navbar-collapse collapse" >
      <ul class="nav navbar-nav navbar-right">
        <li class="homepage active"><a href="#home" id="homepage" >Home</a></li>
        <li class="about"><a href="#about" id="page-about">About</a></li>
        <li class="reports"><a href="#reports" id="page-reports">Reports</a></li>
        <li class="contact"><a href="#contact" id="page-contact">Contact</a></li>
        <li><a class="separator">|</a></li>
        <li class="link-login"><a href="login.php?type=login" id="login">Login</a></li>
        <li class="link-register"><a href="login.php?type=register" id="register">Register</a></li>
      </ul>
    </div>
  </form>

  <form id="navbar-area" style="display:none">
    <div id="navbar_area" class="mynavbar navbar-collapse collapse" >
      <ul class="nav navbar-nav navbar-right">
        <li class="reports"><a href="area.php" id="page-reports">Reports</a></li>
        <li class="chat"><a href="chat.php" id="page-chat" >Chat</a></li>
        <li><a class="separator">|</a></li>

        <li class="dropdown">
          <a  class="separator dropdown-toggle" href="#profile" id="username" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >
            <?php if(isset($_SESSION['img'])) {?>
              <img src="img/upload/<?php echo $_SESSION['img']?>" class="img-circle img-responsive img-user" alt="user" id="img-user"/>
          <?php } ?>
          </a>
          <div class="info-user dropdown-menu">
            <div class="box-img">
              <a href="#mofica_profilo">
                <?php if(isset($_SESSION['img'])) {?>
                  <img src="img/upload/<?php echo $_SESSION['img'] ?>" class="img-circle img-responsive" style="height:100% !important; width:80% !important;"alt="user" id="img-user"/>
                <?php } ?>
              </a>
            </div>
            <div class="box-info">
              <div class="row">
                <?php
                 echo $username; ?>
                 <p style="font-size:13px"> <?php echo $email; ?> </p>
              </div>
              <div class="row">
                <a class="btn-user" href="user_info.php">Change Profile</a>
              </div>
              <div class="row ">
                <a class="btn-user" href="database/logout.php">LogOut</a>
              </div>
            </div>
          </div>
        </li>
        <li class="btn-user-hide"><a style="display:none" class="toogle-show"  href="user_info.php">Change Profile</a></li>
        <li class="btn-user-hide"><a style="display:none" class="toogle-show" href="database/logout.php">LogOut</a></li>
      </ul>
    </div>
  </form>

</nav>
