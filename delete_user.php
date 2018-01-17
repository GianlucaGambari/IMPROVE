<?php require_once('database/check_cookie.php') ?>

<div class="menu-info">

  <div class="row">
    <div class="col-lg-12 col-xs-12">
      <text class="title">
      <span class="border glyphicon glyphicon-trash" aria-hidden="true" ></span> Delete Account
    </div>
  </div>

  <div class="info">
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <h3 class="row-pad-delete">Are you sure you want to delete your account <?php echo $username ?> ??</h3>
      </div>
    </div>
    <input type="submit" name="btn-delete-user" id="btn-delete-user" class="btn btn-default btn-lg row-pad-btn" value="Delete Account">
  </div>

</div>
