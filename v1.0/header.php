<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="format-detection" content="telephone=yes" />
  <meta name="HandheldFriendly" content="true" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

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

  <nav class="navbar navbar-expand-lg navbar-light bg-light  justify-content-between">
    <a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" alt="ShiniMark logo" width="170px"></a>
    <ul class="nav nav-pills">
      <li class="nav-item" id="login-button-container">
        <button type="button" class="nav-link btn text-danger" data-toggle="modal" data-target="#logInModal">
          <i class="fas fa-sign-in-alt"></i>
        </button>
      </li>
      <li class="nav-item" id="logout-button-container">
        <button type="button" class="nav-link btn text-danger" id="logout-button">
          <i class="fas fa-power-off"></i>
        </button>
      </li>
    </ul>
  </nav>
  <br>

  <!-- The Login Form -->
<div class="modal" id="logInModal">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">

      <!-- Login Form Header -->
      <div class="modal-header  bg-danger text-white">
        <h4 class="modal-title">Login</h4>
        <button type="button" class="close text-white" id="close-login-form" data-dismiss="modal">&times;</button>
      </div>

      <!-- Login Form body -->
      <div class="modal-body bg-dark form-container-main">
        <!-- <div id="hide-container"> -->
          <center class="p-2">
            <form class="login-form" name="login" autocomplete="off" onsubmit="return blockSubmit();">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter Username" id="login-un" name="login-un">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Enter password" value="" id="login-pwd" name="login-pwd">
              </div>

            </form>
          </center>
        <!-- </div> -->
      </div>

      <!-- Modal footer -->
      <div class="modal-footer  bg-danger">
        <button class="btn btn-danger" id="login-button"  data-dismiss="modal">LOG IN <i class="fas fa-sign-in-alt"></i></button>
      </div>

    </div>
  </div>
</div>

<style>
#form-container-main {
  background: rgba(225, 225, 225, 0.3);
  backdrop-filter: blur(4px);
  -webkit-backdrop-filter: blur(4px);
  display: flex;
  justify-content: center;
  align-items: center;
}

#form-container-main center {
  background: rgba(30, 30, 30, 0.3);
  box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.30);
  backdrop-filter: blur(4px);
  -webkit-backdrop-filter: blur(4px);
  border-radius: 10px;
  border: 1px solid rgba(255, 255, 255, 0.18);
}

#hide-container{
  display: none;
  opacity: 0;
  pointer-events: none;
  width: 0;
  height: 0;
  z-index: -1;
  top: -100vh;
  left: -100vw;
}

.hide{
  display: none;
  opacity: 0;
  pointer-events: none;
}
</style>
