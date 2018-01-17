<?php require_once('database/update_db.php'); ?>

<div class="menu-info">

  <div class="row">
    <div class="col-lg-12 col-xs-12">
      <text class="title">
      <span class="border glyphicon glyphicon-asterisk" aria-hidden="true" ></span> Password
    </div>
  </div>

  <div class="info">
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <h3 class="row-pad">New Password</h3>
      </div>
    </div>
    <div class="row ">
      <div class="col-lg-12 col-xs-12 ">
        <input type="password" name="change-pwd" id="change-pwd" tabindex="1" class="form-control" placeholder="Enter Password.." value='' >
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <h3 class="row-pad">Confirm New Password</h3>
      </div>
    </div>
    <div class="row ">
      <div class="col-lg-12 col-xs-12 ">
        <input type="password" name="change-confirm-pwd" id="change-confirm-pwd" tabindex="1" class="form-control" placeholder="Enter Confirm Password.." value='' >
      </div>
    </div>

    <input type="submit" name="btn-change-pwd" id="btn-change-pwd" class="btn btn-default btn-lg row-pad" style="margin-bottom:100px;" value="Update Password">
  </div>
</div>
