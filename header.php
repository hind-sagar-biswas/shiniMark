<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="format-detection" content="telephone=yes" />
  <meta name="HandheldFriendly" content="true" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

  <!-- style -->
  <link rel="stylesheet" href="assets/css/style.css">

  <title>ShiniMark | Personal Bookmark Site</title>

  <!-- Favicon -->
  <meta name="msapplication-TileImage" content="assets/images/favicon.png"> <!-- Windows 8 -->
  <!--[if IE]><link rel="shortcut icon" href="assets/images/favicon.png"><![endif]-->
  <link rel="icon" type="image/png" href="assets/images/favicon.png">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>
  <?php
  require 'function.php';

  $chiky = new hind();

  if (isset($_POST['filtered'])) {
    $heading = "FILTERED BOOKMARKS";
    $default_btn = `<div class="container d-flex justify-content-center">
      <a href="index.php" class="btn btn-primary">DEFAULT</a>
    </div>`;

    $search_data = null;
    $category = null;
    $status = null;

    if (isset($_POST['search'])) {
      $search_data = $_POST['search'];
    }
    if (isset($_POST['category'])) {
      $category = $_POST['category'];
    }
    if (isset($_POST['status'])) {
      $status = $_POST['status'];
    }

    $condition = $_POST['condition'];
    $order = $_POST['order'];
    $sort = $_POST['sort'];
    $hind = $chiky->display_filtered_data($search_data, $category, $condition, $status, $sort, $order);
  } else {
    $default_btn = "<div class=\"container d-flex justify-content-center\">
    <a href=\"index.php\" class=\"btn btn-danger\">DEFAULT</a>
  </div>";
    $heading = "BOOKMARKS";
    $hind = $chiky->display_data();
  }
  ?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light  justify-content-between">
    <a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" alt="ShiniMark logo" width="170px"></a>
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link btn text-danger" href="#"><i class="fas fa-sign-in-alt"></i></a>
      </li>
    </ul>
  </nav>


  <div id="form-container-main">
    <center class="p-2">
      <form class="login-form" name="login" autocomplete="off">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter Username" id="login-un" name="login-un">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Enter password" value="" id="login-pwd" name="login-pwd">
        </div>
        <button class="btn btn-danger" onclick="login()">LOG IN <i class="fas fa-sign-in-alt"></i></button>
      </form>
    </center>
  </div>

  <script type="text/javascript">
    var loginData = localStorage.getItem("loginData");
    checkLogin();

    function checkLogin() {
      if (loginData != null) {
        document.getElementById('form-container-main').style = "display: none; opacity: 0; pointer-events: none; width: 0; height: 0; z-index: -1; top: -100vh; left: -100vw;";

        loginData = JSON.parse(loginData);
        var userName = loginData['userName'];
        var userAccess = loginData['accessLevel'];

        if (userAccess == 0) {
          document.getElementsByClassName('level-1').style = "display: none;";
        }else if (userAccess == 1) {
          document.getElementsByClassName('level-2').style = "display: none;";
        }
      }
    }

    function login() {
      var form = document.forms["login"];
      var inputUserName = form['login-un'].value;
      var inputPassword = form['login-pwd'].value;
      loginProcess(inputUserName, inputPassword);
    }

    function loginProcess(inputUserName, inputPassword) {
      var access;
      var loginSuccess = true;

      if (inputUserName == "ShiniGami2004") {
        if (inputPassword == "Dashed2004") {
          access = 1;
        }else if (inputPassword == "Hashed@2004") {
          access = 2;
        }else {
          loginSuccess = false;
        }
      }else if (inputUserName == "Guest") {
        if (inputPassword == "Root2004") {
          access = 0;
        }else {
          loginSuccess = false;
        }
      }else {
        loginSuccess = false;
      }

      if (loginSuccess) {
        var userObject = {
          userName: inputUserName,
          userAccess: access
        };
        var jsonFormat = JSON.stringify(userObject);
        localStorage.setItem("loginData", jsonFormat);
      }
      checkLogin();
    }


  </script>
