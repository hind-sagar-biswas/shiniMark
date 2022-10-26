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