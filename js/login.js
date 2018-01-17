'use strict'

$(function() {

  $('#login-form-link').click(function(e) {
    $("#login-form").delay(100).fadeIn(100);
    $("#register-form").fadeOut(100);
    $('#register-form-link').removeClass('active-login');
    $(this).addClass('active-login');
    $('.nav li').removeClass('active');
    $('.link-login').addClass('active');
    e.preventDefault();
  });
  $('#register-form-link').click(function(e) {
    $("#register-form").delay(100).fadeIn(100);
    $("#login-form").fadeOut(100);
    $('#login-form-link').removeClass('active-login');
    $(this).addClass('active-login');
    $('.nav li').removeClass('active');
    $('.link-register').addClass('active');
    e.preventDefault();
  });

});
var ERRSTRING = "<strong>Error!</strong> "
var re = /^\w+$/;

function ok(button) {
  if (button !== "user" && button !== "password" && button !== "new-user" && button !== "email" && button !== "new-password" && button !== "confirm-password" )
    return true;
  var form = button + "-form";
  var glyph = button + "-glyph";
  var err = button + "-err";
  $('#' + err).empty();
  $('#' + err).addClass('hide');
  $('#' + form).removeClass("has-error");
  $('#' + glyph).removeClass("glyphicon-remove");
  $('#' + form).addClass("has-success");
  $('#' + glyph).addClass("glyphicon-ok");
  $('#' + glyph).removeClass("invisible");
  return true;
}

function bad(button, error) {
  if (button !== "user" && button !== "password" && button !== "new-user" && button !== "email" && button !== "new-password" && button !== "confirm-password" )
    return false;
  var form = button + "-form";
  var glyph = button + "-glyph";
  var err = button + "-err";
  $('#' + form).removeClass("has-success");
  $('#' + glyph).removeClass("glyphicon-ok");
  $('#' + form).addClass("has-error");
  $('#' + glyph).addClass("glyphicon-remove");
  $('#' + glyph).removeClass("invisible");
  $('#' + err).empty();
  $('#' + err).append(ERRSTRING + error);
  $('#' + err).removeClass('hide');
  return false;
}


/* check Login */

function checkUser() {
  if ($('#login-form-link').hasClass('active-login')) {
    if ($('#user').val().length === 0)
      return bad("user", "Username missing");
    else
      return ok("user");
  }
  return false;
}

function checkPassword() {
  if ($('#login-form-link').hasClass('active-login')) {
    if ($('#password').val().length === 0) return bad("password", "Password missing");
    else return ok("password");
  }
  return false;

}

function enableLogin() {
  checkUser();
  checkPassword();
}


/*check Register*/

function checkNewUser() {
  if ($('#register-form-link').hasClass('active-login')) {
    var nusername = $('#new-username').val();
    if ($('#new-username').val().length === 0)
      return bad("new-user", "Username missing");
    else if (!/^\w+$/.test(nusername))
      return bad("new-user", "Username must contain only letters, numbers and underscores!");
    else
      return ok("new-user");
  }
  return false;
}

function checkEmail() {
  if ($('#register-form-link').hasClass('active-login')) {
    var email = $('#email').val();
    if (email.length === 0)
      return bad("email", "E-mail address missing");
    else if (!/.+@.+\..+/.test(email))
      return bad("email", "E-mail address not valid");
    else return ok("email");
  }
  return false;
}

function checkNewPassword() {
  if ($('#register-form-link').hasClass('active-login')) {
    var nPassword = $('#new-password').val();
    if (nPassword.length === 0)
      return bad("new-password", "New password missing");
    else if (nPassword.length < 6)
      return bad("new-password", "New password must contain at most 6 characters");
    else if (!/[0-9]/.test(nPassword))
      return bad("new-password", "New password must contain at most one number (0-9)");
    else return ok("new-password");
  }
  return false;
}

function checkConfPassword() {
  if ($('#register-form-link').hasClass('active-login')) {
    var confPassword = $('#confirm-password').val();
    if (confPassword.length === 0)
      return bad("confirm-password", "Please re-type password");
    else if (confPassword !== $('#new-password').val())
      return bad("confirm-password", "Password and confirm password do not match");
    else return ok("confirm-password");
  }
  return false;
}

function enableRegister() {
  checkNewUser();
  checkEmail();
  checkNewPassword();
  checkConfPassword();
}


$(document).ready(function() {
  $('#user').blur(checkUser);
  $('#password').blur(checkPassword);
  $('#new-username').blur(checkNewUser);
  $('#email').blur(checkEmail);
  $('#new-password').blur(checkNewPassword);
  $('#confirm-password').blur(checkConfPassword);
  $('#login-submit').focus(enableLogin);
  $('#register-submit').focus(enableRegister);
});
