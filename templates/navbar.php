<nav class="navbar navbar-expand-lg navbar-light bg-light  justify-content-between">
    <a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" alt="ShiniMark logo" width="170px"></a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler bg-danger btn-danger" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <!-- <span class="navbar-toggler-icon text-white"></span> -->
        <i class="fas fa-grip-horizontal text-white"></i>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-danger" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-danger" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-danger" href="#">Link</a>
            </li>
        </ul>

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
    </div>
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
                <button class="btn btn-danger" id="login-button" data-dismiss="modal">LOG IN <i class="fas fa-sign-in-alt"></i></button>
            </div>

        </div>
    </div>
</div>