
<?php require_once('database/check_cookie.php') ?>
<?php require_once('database/update_db.php') ?>

<div class="menu-info">

  <div class="row">
    <div class="col-lg-12 col-xs-12">
      <text class="title">
      <span class="border glyphicon glyphicon-user" aria-hidden="true" style="padding-right:10px;"></span> Account
    </div>
  </div>

  <div class="info">
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <h3 class="row-pad">Username</h3>
      </div>
    </div>
    <div class="row ">
      <div class="col-lg-12 col-xs-12 ">
        <input type="text" name="change-user" id="change-user" tabindex="1" class="form-control" placeholder="<?php echo $username ?>" value='' >
      </div>
    </div>

    <input type="submit" name="btn-change-user" id="btn-change-user" class="btn btn-default btn-lg row-pad"  value="Update Username">

    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <h3 class="row-pad">Email Address</h3>
      </div>
    </div>
    <div class="row ">
      <div class="col-lg-12 col-xs-12 ">
        <input type="text" name="change-email" id="change-email" tabindex="1" class="form-control" placeholder="<?php echo $email ?>" value=''>
      </div>
    </div>

    <input type="submit" name="btn-change-email" id="btn-change-email" class="btn btn-default btn-lg row-pad" style="margin-bottom:60px;" value="Update Email">
  </div>
</div>
