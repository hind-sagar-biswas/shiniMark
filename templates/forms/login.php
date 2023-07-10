<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="loginModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="loginTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="loginTitle">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-dark form-container-main">
                <center class="p-2">
                    <form class="login-form" name="login" autocomplete="off" onsubmit="return blockSubmit();">
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" placeholder="Enter Username" id="login-un" name="login-un">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Enter password" value="" id="login-pwd" name="login-pwd">
                        </div>
                    </form>
                </center>
            </div>
            <div class="modal-footer bg-danger text-white">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CLOSE</button>
                <button type="button" id="login-button" class="btn bg-white text-dark" data-bs-dismiss="modal">LOG IN <i class="fas fa-sign-in-alt"></i></button>
            </div>
        </div>
    </div>
</div>
