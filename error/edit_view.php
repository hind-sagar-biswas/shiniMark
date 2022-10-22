<?php require 'header.php';

//  FUNCTIONS TO LOAD DATA
require 'function.php';

$chiky = new hind();

if(isset($_GET['status'])){
    if($_GET['status']='edit'){
        $id = $_GET['id'];
        $hinds_data = $chiky->display_data_by_id($id);
    }
}
  require 'edit_form.php'; ?>

  <script src="assets/js/time.js"></script>

  <?php
  require 'footer.php';
  ?>
